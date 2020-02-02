<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefone extends Model
{
    protected $fillable = [
        'id',
        'ddd',
        'fone',
        'pessoa_id'  //Faz o vínculo com a entidade pessoa
    ];  
    
    protected $table = "telefones";

        public function pessoa(){

            return $this -> belongsTo(Pessoa::class, 'pessoa_id');
        }
}

