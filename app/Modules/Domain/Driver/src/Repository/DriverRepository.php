<?php

namespace Logistic\Modules\Domain\Driver\src\Repository;

use App\Modules\Domain\Driver\src\Repository\DriverRepositoryInterface;
use App\Modules\Domain\Driver\src\Models\Driver;
use Logistic\Modules\Domain\Core\src\Repository\CoreRepository;

class DriverRepository extends CoreRepository implements DriverRepositoryInterface
{
    protected function model(): string
    {
        return Driver::class;
    }

    /**
     * @param string $license
     * @return mixed
     */
    public function findByLicense(string $license): mixed
    {
        return $this->model->where('license_number', $license)->first();
    }
}
