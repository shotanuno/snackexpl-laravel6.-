<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnackStoreTable extends Migration
{
    public function up()
    {
        Schema::create('snack_store', function (Blueprint $table) {
            $table->integer('snack_id')->unsigned();
            $table->integer('store_id')->unsigned();
            /* この次のコードが必要か分からない。 */
            $table->primary(['snack_id', 'store_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('snack_store');
    }
}
