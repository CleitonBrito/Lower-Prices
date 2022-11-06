<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Markets;
use App\Models\Products;
use Illuminate\Http\Request;

class MarketsController extends Controller
{
    private $markets;
    public function __construct(Markets $markets){
        $this->markets = $markets;
    }

    public function index()
    {
        return view('site.market');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $market = $this->markets::find($id);
        $products = Products::join('prices', 'products.id_product', '=', 'prices.fk_product')->where('prices.fk_market', '=', $market->id_market)->get();
        
        return view('site.market', ['market' => $market, 'products' => $products]);
    }

   
    public function edit(Mercados $mercados)
    {
        //
    }

    public function update(Request $request, Mercados $mercados)
    {
        //
    }

    public function destroy(Mercados $mercados)
    {
        //
    }
}
