<?php

namespace App\Models;

use App\Models\Produtos;
use App\Models\Mercados;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    private $produto;

    public function __construct(Produtos $produto){
        $this->produto = $produto;
    }

    public function mercado(){
        return $this->belongsTo(Mercados::class, 'fk_id_mercado');
    }
}
