@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Novo Contato</h3>
    </div>

    <div class="col-md-6 well">
        <form class="col-md-12" action="{{ url('/pessoas/store') }}" method="GET">
            <!--{{csrf_field()}} -->
            <div class="from-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label class="control-label">Nome</label>
                    <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" placeholder="Nome">
                    @if($errors->has('nome'))
                        <span class="help-block">
                            {{ $errors->first('nome') }}
                        </span>
                    @endif
             </div>
             <div class="from-group col-md-4 {{ $errors->has('ddd') ? 'has-error' : '' }}">
                <label class="control-label">DDD</label>
                    <input type="text" name="ddd" value="{{ old('ddd') }}" class="form-control" placeholder="DDD">
                    @if($errors->has('ddd'))
                        <span class="help-block">
                            {{ $errors->first('ddd') }}
                        </span>
                    @endif
             </div>
             <div class="from-group col-md-8 {{ $errors->has('fone') ? 'has-error' : '' }}">
                <label class="control-label">Telefone</label>
                    <input type="text" name="fone" value="{{ old('fone') }}" class="form-control" placeholder="Telefone">
                    @if($errors->has('fone'))
                        <span class="help-block">
                            {{ $errors->first('fone') }}
                        </span>
                    @endif
             </div>
                <button style="margin-top: 5px" class="btn btn-primary"> Salvar </button>
        </form>
    </div>

@endsection