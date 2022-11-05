<?php

namespace App\Models;

use App\Models\Markets;
use App\Models\Products;
use App\Models\Prices;
use App\Models\Images;

use Illuminate\Database\Eloquent\Model;

class Markets extends Model
{
    protected $fillable = [
        'id_market',
        'name',
        'address',
        'city',
        'UF'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'markets';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_market';

    protected $keyType = 'string';


    public function image(){
        return $this->morphOne(Images::class, 'imageable');
    }

    public function products(){
        return $this->belongsToMany(Products::class, 'prices', 'fk_market', 'fk_product')->as('productsTo');;
    }
    
}
