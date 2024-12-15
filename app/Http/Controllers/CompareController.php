<?php

namespace App\Http\Controllers;

use App\Models\Compare;
use App\Models\Markets;
use App\Models\Prices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = ['f5cf9951-af87-44f7-8d2d-8ad761a6ac81', 'cfc56bae-0b2e-46d5-b7e6-358600fc527c'];
        $products = Prices::select('products.id_product', 'products.name')
            ->join('products', 'products.id_product', '=', 'prices.fk_product')
            ->distinct('product.id_product')
            ->get();
        
        foreach($markets as $market){
            $prices_products[$market]['market_data'] = Markets::select('*')->where('markets.id_market', $market)->first();
        }
        foreach($products as $product){
            $price = Prices::select('*')
                ->join('products', 'products.id_product', '=', 'prices.fk_product')
                ->join('images', 'products.id_product', '=', 'images.imageable_id')
                ->where('prices.fk_product', $product->id_product)
                ->orderBy('prices.price', 'asc')
                ->first();
            $prices_products[$price->fk_market]['products'][] = $price;
        }
        return view('site.compare', ['prices' => $prices_products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function show(Compare $compare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function edit(Compare $compare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compare $compare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compare  $compare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compare $compare)
    {
        //
    }
}
