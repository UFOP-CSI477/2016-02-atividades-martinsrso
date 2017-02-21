<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Paciente extends Authenticatable
{

    use Notifiable;

    public $timestamps = false;
    public $remember_token = false;

    protected $fillable = [
      'nome', 'login', 'senha',
    ];

    protected $hidden = [
      'id', 'senha',
    ];

    public function exames()
    {
        return $this->hasMany('App\Exame');
    }
}
