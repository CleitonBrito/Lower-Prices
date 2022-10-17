<?php

namespace App\Models;

use App\Models\Markets;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Markets extends Model
{
    private $market;

    public function __construct(Markets $market){
        $this->market = $market;
    }

    public function products(){
        return $this->hasMany(Products::class, 'id_product');
    }
}
