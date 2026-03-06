<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('itemId');
            $table->string('itemName');
            $table->integer('itemSize');
            $table->integer('itemBoxBottles');
            $table->integer('itemQNT');
            $table->integer('itemExBottle');
            $table->Date('itemExpDate')->nullable();
            $table->Date('itemLastUpdate');
            $table->string('itemType');
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
        Schema::dropIfExists('items');
    }
}
