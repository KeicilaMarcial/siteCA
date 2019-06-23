<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
   protected $fillable = [
        'imagem', 'status','user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
