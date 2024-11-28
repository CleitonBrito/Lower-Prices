<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Models\Markets;
use App\Models\Products;
use App\Models\Prices;
use App\Models\Images;
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

    public function create(Request $request)
    {
        return view('site.forms.marketFormCreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'uf' => 'required|string|max:2',
            'address' => 'required|string|max:150',
        ],
        [
            'name.required' => 'Name is required!',
            'name.max' => 'Name too long much. Max is :max caracters',
            'city.required' => 'City is required!',
            'city.max' => 'City too long much. Max is :max caracters',
            'uf.required' => 'UF is required!',
            'uf.max' => 'UF too long much. Max is :max caracters',
            'address.required' => 'Address is required!',
            'address.max' => 'Address too long much. Max is :max caracters',
        ]
        );

        try{
            $id_market = (string)Str::uuid();
            $this->markets::create([
                'id_market' => $id_market,
                'name' => $request->name,
                'city' => $request->city,
                'UF' => $request->uf,
                'address' => $request->address
            ]);

            if(!empty($request->file('img_market'))){
                $filePath = $request->file('img_market')->store('/markets');
            }else{
                $filePath = NULL;
            }

            $market = Markets::find($id_market);

            $market->image()->save(
                new Images([
                    'imageable_id' => $id_market,
                    'path' => $filePath
                ])
            );
            
            return redirect()->back()->with('success', 'Market stored with success!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function show($id)
    {
        try{
            $market = $this->markets::find($id);
            $products = Products::join('prices', 'products.id_product', '=', 'prices.fk_product')->where('prices.fk_market', '=', $market->id_market)->get();
            $onlyIdProducts = array_column(json_decode(json_encode($products), true), 'id_product');
            $productsNotInserted = Products::whereNotIn('id_product', $onlyIdProducts)
            ->get();
            
            return view('site.market', ['market' => $market, 'products' => $products, 'productsNotInserted' => $productsNotInserted]);
        }catch(\Exception $e){
            abort(404);
        }
    }

   
    public function edit($id_market)
    {
        $market = $this->markets::find($id_market);
        $market->image;

        return view('site.forms.marketFormUpdate', ['market' => $market]);
    }

    public function update(Request $request)
    {
        $market = $this->markets::find($request->id_market);
        $market->image;

        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'UF' => $request->uf
        ];

        try{
            // Se tiver path, é pq tem já. Só atualiza
            // Se não tiver path, cadastra

            // Se não tiver file e tiver path, atualiza
            // Se não tiver file e não tiver path, FAZ NADA

            if(file_exists($request->img_market) && isset($market->image->path)){
                unlink(public_path('\\storage\\').$market->image->path);
                $image_market = Images::find($market->image->id);
                $new_image_path = $request->file('img_market')->store('/markets');

                $image_market->update([
                    'path' => $new_image_path
                ]);

            }else if(!isset($market->image->path) && file_exists($request->img_market)){
                $filePath = $request->file('img_market')->store('/markets');
                $market->image()->save(
                    new Images([
                        'imageable_id' => $request->id_market,
                        'path' => $filePath
                    ])
                );
            }

            $market->update($data);
            return redirect()->back()->with('success', 'Market updated with success!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy()
    {
        //
    }
}
