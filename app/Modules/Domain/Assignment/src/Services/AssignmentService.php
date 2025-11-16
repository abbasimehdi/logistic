<?php

namespace Logistic\Modules\Domain\Assignment\src\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Logistic\Modules\Domain\Assignment\src\Repository\AssignmentRepository;
use Logistic\Modules\Domain\Driver\src\Repository\DriverRepository;
use Logistic\Modules\Domain\Vehicle\src\Repository\VehicleRepository;

class AssignmentService
{
    public function __construct(
        protected AssignmentRepository $repo,
        protected VehicleRepository $vehicleRepo,
        protected DriverRepository $driverRepo
    ) {}

    /**
     * @param int $vehicleId
     * @param int $driverId
     * @return mixed
     */
    public function assign(int $vehicleId, int $driverId): mixed
    {
        return DB::transaction(function () use ($vehicleId, $driverId) {
            // create or update assignment record
            $existing = $this->repo->forVehicle($vehicleId);

            if ($existing) {
                $existing->update(['driver_id' => $driverId]);
                $assignment = $existing;
            } else {
                $assignment = $this->repo->create([
                    'vehicle_id' => $vehicleId,
                    'driver_id' => $driverId
                ]);
            }

            // also update vehicle.driver_id for quick relation (denormalized)
            $this->vehicleRepo->update($vehicleId, ['driver_id' => $driverId]);

            return $assignment;
        });
    }

    /**
     * @return LengthAwarePaginator
     */
    public function vehiclesWithDriver(): LengthAwarePaginator
    {
        return $this->vehicleRepo->paginateWithDriver();
    }
}
