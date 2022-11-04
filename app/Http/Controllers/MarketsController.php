<?php

namespace App\Http\Controllers;

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
        $market->products;

        return view('site.market', ['data' => $market]);
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
