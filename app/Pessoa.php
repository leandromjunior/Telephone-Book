<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    //Dentro deste Array estão todos os atributos usados na model
    protected $fillable = [
        'id',
        'nome'
    ];
    //Nome da tabela
    protected $table = 'contatos';

      public function telefone(){

        return $this -> hasMany(Telefone::class, 'pessoa_id');

    }

    public static function indexLetra($letras){

        return static::where('nome', 'LIKE', $letras . '%')->get();
    }

    public static function busca($criterio){

        return static::where('nome', 'LIKE', '%' . $criterio . '%')->get();
    }
}


