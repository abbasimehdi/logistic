<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Logistic\Modules\Domain\Driver\src\Constants\DriverConstants;
use Logistic\Modules\Domain\Vehicle\src\Constants\VehicleConstants;

return new class extends Migration
{
    public function up()
    {
        Schema::create(VehicleConstants::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->unique();
            $table->string('brand');
            $table->string('model');
            $table->year('year');
            $table->foreignId('driver_id')->nullable()->constrained(DriverConstants::TABLE)->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(VehicleConstants::TABLE);
    }
};
