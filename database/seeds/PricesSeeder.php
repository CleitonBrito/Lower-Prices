<?php

use App\Models\Markets;
use App\Models\Products;
use App\Models\Prices;
use Illuminate\Database\Seeder;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markets = Markets::all();

        foreach($markets as $market){
            if (!empty($market->products)){
                factory(Prices::class, 30)->create();
            }
        }
    }
}
