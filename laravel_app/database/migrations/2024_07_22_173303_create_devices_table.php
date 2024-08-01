<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_devices_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->string('device_id')->unique();
            $table->string('mobile_number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
