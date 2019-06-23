<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'user_id','nome','descricao','link','imagem','status',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
