<?php

namespace App\Moldels;

use Illuminate\Database\Eloquent\Model;

class \FotoMembro extends Model
{
    protected $fillable = [
        'foto', 'status','user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
