<?php


return [
    App\Providers\AppServiceProvider::class,
    \Logistic\Modules\Domain\Core\CoreServiceProvider::class,
    \Logistic\Modules\Domain\Driver\DriverServiceProvider::class,
    \Logistic\Modules\Domain\Vehicle\VehicleServiceProvider::class,
    \Logistic\Modules\Domain\Assignment\AssignmentServiceProvider::class,
];
