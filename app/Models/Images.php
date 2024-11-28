<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'path',
        'imageable_id'
    ];

    protected $keyType = 'string';

    public function imageable(){
        return $this->morphTo();
    }
}
