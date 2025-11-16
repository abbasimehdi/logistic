<?php

namespace Logistic\Modules\Domain\Vehicle\src\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Logistic\Modules\Domain\Vehicle\src\Repository\VehicleRepository;

class VehicleService
{
    /**
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct(
        protected VehicleRepository $vehicleRepository
    )
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator
    {
        return $this->vehicleRepository->paginate();
    }

    public function create(array $data)
    {
        return $this->vehicleRepository->create($data);
    }

    /**
     * @param $id
     * @return Model|null
     */
    public function show($id)
    {
        return $this->vehicleRepository->find($id);
    }
}

