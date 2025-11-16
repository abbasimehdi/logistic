<?php

namespace App\Modules\Domain\Vehicle\src\Models;

use App\Modules\Domain\Driver\src\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Logistic\Modules\Domain\Vehicle\src\Constants\VehicleConstants;

class Vehicle extends Model
{
    protected $table = VehicleConstants::TABLE;
    protected $fillable = VehicleConstants::FILLABLE;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
