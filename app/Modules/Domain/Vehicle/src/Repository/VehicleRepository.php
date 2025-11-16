<?php

namespace Logistic\Modules\Domain\Vehicle\src\Repository;

use App\Modules\Domain\Vehicle\src\Repository\VehicleRepositoryInterface;
use App\Modules\Domain\Vehicle\src\Models\Vehicle;
use Logistic\Modules\Domain\Core\src\Repository\CoreRepository;

class VehicleRepository extends CoreRepository implements VehicleRepositoryInterface
{
    /**
     * Get paginated vehicles with driver relationship
     */
    public function paginateWithDriver(int $perPage = 15, array $columns = ['*'])
    {
        return $this->model->with(['driver'])->paginate($perPage, $columns);
    }

    /**
     * @return string
     */
    protected function model(): string
    {
        return Vehicle::class;
    }

    /**
     * @param string $plate
     * @return mixed
     */
    public function findByPlate(string $plate): mixed
    {
        return $this->model->where('plate_number', $plate)->first();
    }
}
