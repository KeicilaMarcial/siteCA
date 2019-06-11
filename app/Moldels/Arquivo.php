<?php

namespace App\Moldels;

use Illuminate\Database\Eloquent\Model;

class \Arquivo extends Model
{
     protected $fillable = [
        'name', 'status', 'tipo','user_id',
    ];
   public function user()
    {
        return $this->belongsTo('App\User');
    }
}
