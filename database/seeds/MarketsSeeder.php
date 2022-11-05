<?php

use App\Models\Markets;
use App\Models\Products;
use Illuminate\Database\Seeder;

class MarketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Markets::class, 5)->create();
    }
}
