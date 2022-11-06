<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentUserTable extends Migration
{
    public function up()
    {
        Schema::create('comment_user', function (Blueprint $table) {
            $table->integer('comment_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->primary(['comment_id', 'user_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment_user');
    }
}
