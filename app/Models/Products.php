<?php

namespace App\Models;

use App\Models\Products;
use App\Models\Markets;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    private $produto;

    public function __construct(Products $produto){
        $this->produto = $produto;
    }

    public function mercado(){
        return $this->belongsTo(Markets::class, 'fk_id_mercado');
    }
}
