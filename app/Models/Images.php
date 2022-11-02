<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $keyType = 'string';

    public function imageable(){
        return $this->morphTo();
    }
}
