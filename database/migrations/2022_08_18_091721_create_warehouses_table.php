<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('product_id');         
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('import');
            $table->integer('export');
           
            $table->integer('price_cost');
            $table->integer('price_sale');
            $table->integer('price_discount');
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
        Schema::dropIfExists('warehouses');
    }
};
