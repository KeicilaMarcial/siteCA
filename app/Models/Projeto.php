<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
   	protected $fillable = [
        'user_id','nome','descricao','imagem','status',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
