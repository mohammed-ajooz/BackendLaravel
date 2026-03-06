<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceInfo', function (Blueprint $table) {
            $table->integer('invId');
            $table->string('itemName');
            $table->string('itemDesc');
            $table->integer('itemQNT');
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
        Schema::dropIfExists('invoiceinfo');
    }
}
