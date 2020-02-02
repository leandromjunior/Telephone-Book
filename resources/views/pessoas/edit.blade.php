@extends('template.app')

@section('content')

<div class="col-md-12">
        <h3>Editar Contato</h3>
    </div>

    <div class="col-md-6 well">
        <form class="col-md-12" action="{{ url('/pessoas/update') }}" method="GET">
            <!--{{csrf_field()}} -->
            <input type="hidden" name="id" value="{{ $pessoa->id }}">
            <div class="from-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label class="control-label">Nome</label>
                    <input type="text" name="nome" value="{{ $pessoa->nome }}" class="form-control" placeholder="Nome">
                    @if($errors->has('nome'))
                        <span class="help-block">
                            {{ $errors->first('nome') }}
                        </span>
                    @endif
             </div>
             <div class="col md-12">
             <button style="margin-top: 5px" class="btn btn-primary">Salvar</button>
             </div>
        </form>
        <!-- Apenas questão estética -->
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
    </div>

@endsection