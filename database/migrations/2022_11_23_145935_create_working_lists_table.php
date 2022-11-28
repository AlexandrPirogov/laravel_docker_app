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
        Schema::create('working_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('assign_id');
            $table->foreign('assign_id')->references('id')->on('assign_list');
            $table->timestamp('working_start');
            $table->timestamp('working_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_lists');
    }
};
