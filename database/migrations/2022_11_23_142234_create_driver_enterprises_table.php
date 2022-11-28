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
        Schema::create('driver_enterprise', function (Blueprint $table) {
            $table->integer('driver_id')->unsigned();
            $table->integer('enterprise_id')->unsigned();    
            $table->foreign('driver_id')->references('id')->on('drivers');
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
        Schema::dropIfExists('driver_enterprise');
    }
};
