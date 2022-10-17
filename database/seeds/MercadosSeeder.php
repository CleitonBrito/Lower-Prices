<?php

use App\Models\Mercados;
use Illuminate\Database\Seeder;

class MercadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Mercados::class)->create();
    }
}
