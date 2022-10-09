<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            /* 下記laravel参照 */
            $table->integer('id');
            $table->string('image_path', 200);
            $table->integer('imageable_id');
            $table->string('imageable_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
