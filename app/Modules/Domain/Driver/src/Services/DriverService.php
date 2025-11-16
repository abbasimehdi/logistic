<?php

namespace Logistic\Modules\Domain\Driver\src\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Logistic\Modules\Domain\Driver\src\Repository\DriverRepository;

class DriverService
{
    /**
     * @param DriverRepository $driverRepository
     */
    public function __construct
    (
        protected DriverRepository $driverRepository
    )
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator
    {
        return $this->driverRepository->paginate();
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->driverRepository->create($data);
    }

    /**
     * @param $id
     * @return Model|null
     */
    public function show($id): ?Model
    {
        return $this->driverRepository->find($id, ['vehicles']);
    }
}
