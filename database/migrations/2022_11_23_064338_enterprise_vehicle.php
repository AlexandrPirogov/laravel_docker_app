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
        //
        Schema::create('enterprise_vehicle', function (Blueprint $table) {
            $table->integer('vehicle_id')->unsigned();
            $table->integer('enterprise_id')->unsigned();    
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('enterprise_id')->references('id')->on('enterprises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('enterprise_vehicle');
    }
};
