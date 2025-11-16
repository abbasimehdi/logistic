<?php

namespace App\Modules\Domain\Vehicle\src\Repository;

interface VehicleRepositoryInterface
{
    public function findByPlate(string $plate): mixed;
}
