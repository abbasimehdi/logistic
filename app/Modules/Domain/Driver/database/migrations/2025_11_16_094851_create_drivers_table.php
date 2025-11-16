<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Logistic\Modules\Domain\Driver\src\Constants\DriverConstants;

return new class extends Migration
{
    public function up()
    {
        Schema::create(DriverConstants::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('license_number')->unique();
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(DriverConstants::TABLE);
    }
};
