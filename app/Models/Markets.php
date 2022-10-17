<?php

namespace App\Models;

use App\Models\Markets;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Markets extends Model
{
    private $mercado;

    public function __construct(Markets $mercado){
        $this->mercado = $mercado;
    }

    public function Products(){
        return $this->hasMany(Products::class, 'id_produto');
    }
}
