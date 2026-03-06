<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('losses', function (Blueprint $table) {
            $table->increments('lossId');
            $table->integer('dateId');
            $table->string('itemName');
            $table->string('itemType');
            $table->string('itemDesc');
            $table->integer('itemExBottle');
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
        Schema::dropIfExists('losses');
    }
}
