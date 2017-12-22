<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public function endereco(){
    	return $this->belongsTo('App\Models\Endereco', 'endereco_id');	
    }

    public function responsavel(){
    	return $this->hasOne('App\Models\Responsavel', 'aluno_id');
    }
}
