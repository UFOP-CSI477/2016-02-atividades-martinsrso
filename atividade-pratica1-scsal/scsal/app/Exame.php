<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'paciente_id', 'procedimento_id', 'data',
    ];

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

    public function procedimento()
    {
        return $this->belongsTo('App\Procedimento');
    }
}
