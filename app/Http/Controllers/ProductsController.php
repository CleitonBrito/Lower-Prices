<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Models\Products;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    private $product;

    public function __construct(Products $product){
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product::with('images')->get();
        return view('site.products', ['products' => $products]);
    }

    public function getProductInMarkets(Request $request){
        if(isset($request->markets)){
            $products = $this->product::select('*')
            ->join('prices', 'prices.fk_product', '=', 'products.id_product')
            ->rightJoin('markets', function($join) use ($request){
                $join->on('prices.fk_market', '=', 'markets.id_market')
                ->whereIn('markets.id_market', $request->markets);
            })
            ->where('products.name', 'like', $request->name.'%')
            ->groupBy('products.id_product')
            ->having(DB::raw('count(markets.id_market)'), '>=', count($request->markets))
            ->get();
            return $products;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:100',
            ],
            [
                'name.required' => 'Name is required!',
                'name.max' => 'Name too long much. Max is :max caracters',
                'description.required' => 'Description is required!',
                'description.max' => 'Description too long much. Max is :max caracters'
            ]
        );


        try{
            $id_product = Str::uuid();
            $product = $this->product::create([
                'id_product' => $id_product,
                'name' => $validated['name'],
                'description' => $validated['description']
            ]);


            $product = $this->product::find($id_product);
            $filePath = $request->file('img_product')->store('/products');

            $product->image()->save(
                new Images([
                    'path' => $filePath,
                ])
            );
       
            return redirect()->back()->with('success', 'Product stored with success!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    // public function show(Produtos $produtos)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    // public function edit(Produtos $produtos)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Produtos $produtos)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Produtos $produtos)
    // {
    //     //
    // }
}
