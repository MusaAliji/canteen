<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price');
            $table->integer('kinds_id')->unsigned();
            $table->foreign('kinds_id')->references('id')->on('kinds')->onDelete('cascade');
            $table->binary('image');
            $table->timestamps();
        });

        Schema::create('canteen_product',function (Blueprint $table){
            $table->integer('canteen_id')->unsigned();
            $table->foreign('canteen_id')->references('id')->on('canteens')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('stock');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('canteens_products');
    }
}
