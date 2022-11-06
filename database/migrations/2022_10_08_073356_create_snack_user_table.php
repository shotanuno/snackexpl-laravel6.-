<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnackUserTable extends Migration
{
    public function up()
    {
        Schema::create('snack_user', function (Blueprint $table) {
            $table->integer('snack_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->primary(['snack_id', 'user_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('snack_user');
    }
}
