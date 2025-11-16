<?php


namespace Logistic\Modules\Domain\Vehicle\src\Constants;

class VehicleConstants
{
    public const TABLE = 'vehicles';

    public const FILLABLE = [
        'plate_number',
        'brand',
        'model',
        'year',
        'driver_id'
    ];
}
