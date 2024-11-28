<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id_product',
        'name',
        'description',
        'price'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_product';

    protected $casts = [
        'id_market' => 'string'
    ];

    protected $keyType = 'string';

    public function image(){
        return $this->morphOne(Images::class, 'imageable');
    }
    
    public function markets(){
        return $this->belongsToMany(Markets::class)->as('marketsTo');
    }

}
