<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id_product')->primary();
            $table->string('fk_market', 36)->nullable();
            $table->string('name', 50);
            $table->string('description', 100);
            $table->double('price', 5, 2);
            $table->timestamps();

            $table->foreign('fk_market')
                ->references('id_market')->on('markets')
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
        Schema::dropIfExists('produtos');
    }
}
