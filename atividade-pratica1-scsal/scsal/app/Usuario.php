<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    public $remember_token = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'login', 'senha', 'tipo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'senha',
    ];

    public function procedimentos()
    {
        return $this->hasMany('App\Procedimento');
    }

    public function administrador()
    {
        return $this->tipo == 1;
    }

    public function operador()
    {
        return $this->tipo == 2;
    }

}
