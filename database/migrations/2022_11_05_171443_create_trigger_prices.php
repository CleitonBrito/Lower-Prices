<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $trigger = "
        CREATE OR REPLACE TRIGGER itens_insert
        AFTER INSERT on prices
        FOR EACH ROW
        BEGIN
            declare item int;
            SET item = (SELECT count(*) FROM prices where fk_market = NEW.fk_market and fk_product = NEW.fk_product);

            IF item > 1 THEN
                SIGNAL SQLSTATE '45000'
                SET MESSAGE_TEXT = 'Not is possible insert more one products to markets prices';
            END IF;
        END
        ";
        \DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_prices');
    }
}
