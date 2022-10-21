<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnacksTable extends Migration
{
    public function up()
    {
        Schema::create('snacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('overview', 150);
            $table->float('rating_average', 2, 1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('snacks');
    }
}
