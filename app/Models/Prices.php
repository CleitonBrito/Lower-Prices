<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Prices extends Model
{
    public function product(){
        return $this->belongsTo(Products::class, 'fk_product');
    }
}
