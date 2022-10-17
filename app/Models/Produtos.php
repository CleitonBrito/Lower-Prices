<?php

namespace App\Models;

use App\Models\Mercados;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produtos extends Model
{
    use Notifiable;
    private $produto;

    public function __construct(Produto $produto){
        $this->produto = $produto;
    }

    public function mercado(){
        return $this->belongsTo(Mercado::class, 'fk_id_mercado');
    }
}
