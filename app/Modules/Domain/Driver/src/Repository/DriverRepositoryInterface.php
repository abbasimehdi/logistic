<?php

namespace App\Modules\Domain\Driver\src\Repository;

interface DriverRepositoryInterface
{
    public function findByLicense(string $license): mixed;
}
