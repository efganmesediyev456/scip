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
        Schema::create('industrial_projects', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("voen");
            $table->string("project");
            $table->string("material");
            $table->string("production");
            $table->string("time");
            $table->string("demand");
            $table->string("productive_capacity");
            $table->string("investisiya");
            $table->string("area");
            $table->string("sales");
            $table->string("area_electric");
            $table->string("natural_gas");
            $table->string("technical_water");
            $table->string("drinkable_water");
            $table->string("infrastructure_requirements");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industrial_projects');
    }
};
