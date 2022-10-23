<?php

namespace App\Http\Controllers;

use App\Models\Markets;
use App\Models\Products;
use Illuminate\Http\Request;

class MarketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.market');
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
     * @param  \App\Models\Mercados  $mercados
     * @return \Illuminate\Http\Response
     */
    public function show(Mercados $mercados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mercados  $mercados
     * @return \Illuminate\Http\Response
     */
    public function edit(Mercados $mercados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mercados  $mercados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mercados $mercados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mercados  $mercados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mercados $mercados)
    {
        //
    }
}
