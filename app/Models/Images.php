<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'imageable_id',
        'path'
    ];

    protected $keyType = 'string';

    public function imageable(){
        return $this->morphTo();
    }
}
