<?php

use App\Models\Field;
use App\Models\FieldValue;
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
        Schema::create('post_field', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Field::class)->constrained();
            $table->foreignIdFor(Post::class)->constrained();
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
        Schema::dropIfExists('post_field');
    }
};
