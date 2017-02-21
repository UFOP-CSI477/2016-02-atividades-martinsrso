<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nome', 'preco', 'usuario_id',
    ];

    protected $hidden = [
        'usuario_id',
    ];

    public function responsavel()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function exames()
    {
        return $this->hasMany('App\Exame');
    }
}
