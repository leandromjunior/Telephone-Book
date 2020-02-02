<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{
    private $telefone_controller;
    private $pessoa;

    //Injeção de dependência
    public function __construct(TelefoneController $tel_controller){

        $this->telefone_controller = $tel_controller;
        $this->pessoa = new \App\Pessoa();
    }
    public function index($letras)
    {
        $list_pessoas = \App\Pessoa::indexLetra($letras);
        return view('pessoas.index', [
            'pessoas' => $list_pessoas,
            'criterio' => $letras
        ]);
    }

    public function busca(Request $request){
        
        $pessoas = \App\Pessoa::busca($request->criterio);
        return view('pessoas.index', [
            'pessoas' => $pessoas,
            'criterio' => $request->criterio
        ]);
    }

    public function novoView(){
        return view('pessoas.create');
    }

    public function store(Request $request){

     $validacao = $this->validation($request->all());
     
     if($validacao->fails()) {
         return redirect()->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
     }

     $pessoas = \App\Pessoa::create($request->all());
        if($request->ddd && $request->fone){
            $telefones = new Telefone();
            $telefones->ddd = $request->ddd;
            $telefones->fone = $request->fone; //este atributo "fone" é referente ao BD
            $telefones->pessoa_id = $pessoas->id;
         $this->telefone_controller->store($telefones);
        }
        return redirect("/pessoas")->with("status", "Pessoa criada com sucesso");
    }

    public function excluirView($id){

        return view('pessoas.delete', [
            'pessoa' => $this->getPessoa($id)
        ]);
    }

    public function destroy($id){

        $this->getPessoa($id)->delete();

        return redirect(url('pessoas'))->with('success', 'Excluído');
    }

    public function editView($id){

        return view('pessoas.edit', [
            'pessoa'=> $this->getPessoa($id)
        ]);
       // var_dump($this->pessoa->find($id)->nome);
    }

    public function update(Request $request){

        $validacao = $this->validation($request->all());
     
        if($validacao->fails()) {
            return redirect()->back()
                       ->withErrors($validacao->errors())
                       ->withInput($request->all());
        }

        $pessoa = $this->getPessoa($request->id);
        $pessoa->update($request->all());

        return redirect('/pessoas');
    }

    protected function getPessoa($id){

       return $this->pessoa->find($id);
    }
//validação
    private function validation ($data){
//validação ddd e telefone
        if(array_key_exists('ddd', $data) && array_key_exists('fone', $data)) {
            if($data['ddd'] || $data['fone']) {
                $regras['ddd'] = 'required|size:2';
                $regras['fone'] = 'required';
            }
        }
//validação nome
        $regras['nome'] = 'required|min:3';

        $mensagens = [
            'nome.required' => 'Campo nome deve ser preenchido',
            'nome.min' => 'Campo nome deve ter pelo menos 3 letras',
            'ddd.required' => 'Campo ddd deve ser preenchido',
            'ddd.size' => 'Campo ddd deve ter 2 dígitos',
            'fone.required' => 'Campo telefone deve ser preenchido'
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
