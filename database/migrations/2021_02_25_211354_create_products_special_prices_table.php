<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsSpecialPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_special_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('product_count');
            $table->double('special_price');
            $table->timestamps();

            $table->unique(['product_id', 'product_count']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_special_prices');
    }
}
