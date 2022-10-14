<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('fk_mercado');
            $table->string('name', 50);
            $table->string('description', 100);
            $table->double('price', 5, 2);
            $table->timestamps();

            $table->foreign('fk_mercado')
                ->references('id')->on('mercados')
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
