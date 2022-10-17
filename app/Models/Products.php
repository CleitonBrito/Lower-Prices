<?php

namespace App\Models;

use App\Models\Products;
use App\Models\Markets;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    private $product;

    public function __construct(Products $product){
        $this->product = $product;
    }

    public function market(){
        return $this->belongsTo(Markets::class, 'fk_id_market');
    }
}
