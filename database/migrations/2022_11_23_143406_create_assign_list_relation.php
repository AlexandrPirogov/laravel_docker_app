<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_list', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->integer('vehicle_id');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->date('date_start');
            $table->date('date_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_list');
    }
};
