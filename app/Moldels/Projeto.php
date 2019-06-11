<?php

namespace App\Moldels;

use Illuminate\Database\Eloquent\Model;

class \Projeto extends Model
{
   	protected $fillable = [
        'nome','descricao','imagem','status','user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
