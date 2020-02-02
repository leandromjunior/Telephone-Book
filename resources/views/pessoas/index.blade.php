@extends("template.app")

@section("content")

<div>
  <div class="col-sm-12">
@foreach(range('A', 'Z') as $letras)
    <div class="btn-group">
      <a href="{{ url('pessoas/' . $letras) }}" class="btn btn-primary {{ $letras===$criterio ? 'disabled' : '' }}"> <!--Ternário feito para não ficar enviando requisição para a api ao ficar clicando na letra -->
        {{ $letras }}
      </a>  
    </div>
@endforeach
  </div>

<div class="row">
<h2 class="col-sm-8" style="margin-top: 20px">Pesquisa: {{ $criterio }} </h2>
<form action="{{ url('pessoas/busca') }}" method="POST">
    <div style="margin-top: 25px" class="col-lg-12 input-group">
    {{ csrf_field() }}
      <input type="text" class="form-control" name="criterio" placeholder="Buscar Contato...">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Ir</button>
      </span>
    </div><!-- /input-group -->
    </form>
</div><!-- /row -->

        @foreach($pessoas as $pessoa)
        <div class="col-md-3">
         <div style="margin-top: 10px" class="card">
            <div class="card-header">
    {{ $pessoa->nome }}
    <a href="{{ url("/pessoas/$pessoa->id/excluir") }}" class="btn btn-xs btn-danger" style="float: right"> <!-- Na url coloquei aspas duplas pois a variável não é lida com aspas simples -->
    <svg class="bi bi-x-square-fill" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm3.354 4.646L10 9.293l2.646-2.647a.5.5 0 01.708.708L10.707 10l2.647 2.646a.5.5 0 01-.708.708L10 10.707l-2.646 2.647a.5.5 0 01-.708-.708L9.293 10 6.646 7.354a.5.5 0 11.708-.708z" clip-rule="evenodd"/>
</svg>
    </a>
    <a href="{{ url("/pessoas/$pessoa->id/editar") }}" class="btn btn-xs btn-primary" style="float: right"> <!-- Na url coloquei aspas duplas pois a variável não é lida com aspas simples -->
    <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"/>
    </svg>
    </a>
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
        @endforeach
 </div>
@endsection

<!-- Era melhor ter utilizado a tag panel, mas não funcionou, provavelmente por conta do versionamento do
     Bootstrap -->