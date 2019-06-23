<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
     protected $fillable = [
        'name', 'status', 'tipo','arquivo','user_id',
    ];
   public function user()
    {
        return $this->belongsTo('App\User');
    }
}
