@extends('template.app')

@section('content')
<div class="alert alert-danger" role="alert">
         <h3>  <center> Deseja excluir? </center> </h3>
         
        </div>

</div>
    <div class="col-md-3">
         <div style="margin-top: 10px" class="card">
            <div class="card-header">
    {{ $pessoa->nome }}
            </div>
            <div class="card-body">
                 <blockquote class="blockquote mb-0">
                    @foreach($pessoa->telefone as $telefones)
                         <p><strong>Telefone: </strong> {{ $telefones->ddd }} {{ $telefones->fone}}</p>
                    @endforeach
                </blockquote>
            </div>
        </div>
        <div style="margin-top: 5px">
                <a href="{{ url("pessoas/$pessoa->id/destroy") }}" class="btn btn-danger">
                <svg class="bi bi-x-square-fill" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm3.354 4.646L10 9.293l2.646-2.647a.5.5 0 01.708.708L10.707 10l2.647 2.646a.5.5 0 01-.708.708L10 10.707l-2.646 2.647a.5.5 0 01-.708-.708L9.293 10 6.646 7.354a.5.5 0 11.708-.708z" clip-rule="evenodd"/>
                </svg>
            Excluir
        </div>
    </div>

    

@endsection