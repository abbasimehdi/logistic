<?php

namespace Logistic\Modules\Domain\Assignment\src\Repository;

use Logistic\Modules\Domain\Assignment\src\Models\Assignment;
use Logistic\Modules\Domain\Core\src\Repository\CoreRepository;

class AssignmentRepository extends CoreRepository
{
    protected function model(): string
    {
        return Assignment::class;
    }

    public function forVehicle($vehicleId)
    {
        return $this->model->where('vehicle_id', $vehicleId)->first();
    }
}
