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
        Schema::create('agricultural_projects', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("address");
            $table->string("mobile");
            $table->string("email");
            $table->string("project");
            $table->string("district");
            $table->string("sown_area");
            $table->string("processing_area");
            $table->string("product");
            $table->date("date");
            $table->string("irrigation_method");


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
        Schema::dropIfExists('agricultural_projects');
    }
};
