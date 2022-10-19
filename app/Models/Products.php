<?php

namespace App\Models;

use App\Models\Products;
use App\Models\Markets;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id_product',
        'fk_market',
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

    public function market(){
        return $this->belongsTo(Markets::class, 'fk_market');
    }
}
