<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->uuid('id_prices')->primary();
            $table->uuid('fk_market');
            $table->uuid('fk_product');
            $table->double('price', 5, 2);
            $table->timestamps();

            $table->foreign('fk_market')
                ->references('id_market')->on('markets')
                ->onUpdate('restrict')
                ->onDelete('cascade');

            $table->foreign('fk_product')
                ->references('id_product')->on('products')
                ->onUpdate('restrict')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
