<?php

namespace App\Http\Controllers;

use App\Models\Markets;
use App\Models\Prices;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    protected $prices;

    public function __construct(Prices $prices)
    {
        $this->prices = $prices;
    }

    public function store(Request $request){
        $id_market = Markets::find($request->id_market)->id_market;
        $id_product = Products::find($request->id_product)->id_product;

        Prices::create([
            'id_prices' => Str::uuid(),
            'fk_market' => $id_market,
            'fk_product' => $id_product,
            'price' => $request->price
        ]);
    }
}
