<?php

namespace App\Models;

use App\Models\Market;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    private $mercado;

    public function __construct(Market $mercado){
        $this->mercado = $mercado;
    }

    public function Products(){
        return $this->hasMany(Products::class, 'id_produto');
    }
}
