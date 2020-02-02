<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function store(Telefone $telefone){

        try{
            $telefone->save();
        }
        catch(\Exception $e){
            return "Erro: " . $e->getmessage();
        }
    }
}
