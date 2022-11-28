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
        Schema::create('enterprise_manager', function (Blueprint $table) {
            $table->integer('manager_id');
            $table->integer('enterprise_id');
            $table->foreign('manager_id')->references('id')->on('managers');
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
        Schema::dropIfExists('enterprise_manager');
    }
};
