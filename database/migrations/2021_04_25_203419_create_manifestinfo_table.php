<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManifestinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manifestInfo', function (Blueprint $table) {
            $table->integer('mfId');
            $table->string('itemName');
            $table->integer('itemSize');
            $table->integer('itemBoxBottles');
            $table->integer('itemQNT');
            $table->integer('itemExBottle');
            $table->Date('itemExpDate')->nullable();
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
        Schema::dropIfExists('manifestinfo');
    }
}
