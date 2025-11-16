<?php

namespace App\Modules\Domain\Driver\src\Models;

use App\Modules\Domain\Vehicle\src\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Logistic\Modules\Domain\Driver\src\Constants\DriverConstants;

class Driver extends Model
{
    protected $table = DriverConstants::TABLE;
    protected $fillable = DriverConstants::FILLABLE;

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'driver_id');
    }
}
