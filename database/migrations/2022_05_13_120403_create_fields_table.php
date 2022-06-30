<?php

use App\Models\Field;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();

            $table->string('type')->index();
            $table->string('field_group_value')->nullable()->index();
            $table->string('field_group_type')->nullable()->index();

            $table->boolean('required')->default(false);
            $table->boolean('shown_on_table')->default(false);
            $table->boolean('translated')->default(false);

            $table->string('identifier')->index();

            $table->json('name');
            $table->json('placeholder')->nullable();

            $table->string('step')->nullable();
            $table->string('min')->nullable();
            $table->string('max')->nullable();
            $table->string('min_length')->nullable();
            $table->string('max_length')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['field_group_value', 'field_group_type', 'identifier']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
};
