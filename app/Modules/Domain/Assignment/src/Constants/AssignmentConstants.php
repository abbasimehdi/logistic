<?php

namespace Logistic\Modules\Domain\Assignment\src\Constants;

class AssignmentConstants
{
    public const TABLE = 'vehicle_driver_assignments';

    public const FILLABLE = [
        'vehicle_id',
        'driver_id'
    ];
}
