<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Logistic\Modules\Domain\Assignment\src\Constants\AssignmentConstants;
use Logistic\Modules\Domain\Driver\src\Constants\DriverConstants;
use Logistic\Modules\Domain\Vehicle\src\Constants\VehicleConstants;

return new class extends Migration
{
    public function up()
    {
        Schema::create(AssignmentConstants::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained(VehicleConstants::TABLE)->cascadeOnDelete();
            $table->foreignId('driver_id')->constrained(DriverConstants::TABLE)->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['vehicle_id']); // vehicle can have only one assigned driver in this simple model
        });
    }

    public function down()
    {
        Schema::dropIfExists(AssignmentConstants::TABLE);
    }
};
