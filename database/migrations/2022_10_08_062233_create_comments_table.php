<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 30);
            $table->string('body', 300);
            $table->integer('rating');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('snack_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
