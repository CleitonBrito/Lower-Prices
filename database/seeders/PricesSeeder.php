<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Markets;
use App\Models\Products;
use App\Models\Prices;

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
            factory(Prices::class, 2)->create();
        }
    }
}
