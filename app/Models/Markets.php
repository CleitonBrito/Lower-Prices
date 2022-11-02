<?php

namespace App\Models;

use App\Models\Markets;
use App\Models\Products;

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

    public function products(){
        return $this->hasMany(Products::class, 'fk_market');
    }

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
