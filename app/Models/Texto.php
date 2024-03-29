<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
     protected $fillable = [
        'user_id','descricao',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
