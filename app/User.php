<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function arquivos()
    {
        return $this->hasMany('App\Models\Arquivo');
    }

     public function textos()
    {
        return $this->hasMany('App\Models\Texto');
    }
     public function projetos()
    {
        return $this->hasMany('App\Models\Projeto');
    }

     public function imagens()
    {
        return $this->hasMany('App\Models\Imagem');
    }
     
     public function fotos_membros()
    {
        return $this->hasMany('App\Models\FotoMembro');
    }
    
}
