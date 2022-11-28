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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string("brand")->unique();
            $table->string("version");
            $table->string("type");
            $table->integer("seats");
            $table->integer("engine_power");
            $table->date("release_date");
            $table->string("logo")->nullable();
        });

        \DB::statement("alter table vehicles add column brand_id int constraint vehicle_brand_fk_c references brands (id);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
};
