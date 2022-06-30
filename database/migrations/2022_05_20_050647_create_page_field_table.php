<?php

use App\Models\Field;
use App\Models\FieldValue;
use App\Models\Page;
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
        Schema::create('page_field', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Field::class)->constrained();
            $table->foreignIdFor(Page::class)->constrained();
            $table->foreignIdFor(FieldValue::class)->nullable()->constrained();
            $table->longText('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_field');
    }
};
