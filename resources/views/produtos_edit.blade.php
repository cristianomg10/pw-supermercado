@extends('main')

@section('titulo', "Produto #{$p->id}")

@section('conteudo')
<h1>Produto #{{ $p->id }}</h1>
<form method="POST" action="{{ route('prod.salvar', ['id' => $p->id]) }}">
    @csrf
    <div class="form-floating mb-3">
    <input type="text" class="form-control" 
    id="nome" placeholder="Nome" name="nome" value="{{ $p->nome }}">
    <label for="nome">Nome</label>
    </div>
    <div class="form-floating mb-3">
    <input type="number" class="form-control" id="estoque" 
    placeholder="Estoque" name="estoque" value="{{ $p->estoque }}">
    <label for="estoque">Estoque</label>
    </div>
    <div class="form-floating mb-3">
    <input type="number" class="form-control" id="valor" value="{{ $p->valor }}" placeholder="Valor" step="0.01" name="valor">
    <label for="valor">Valor</label>
    </div>

    <select name="categoria_id" class="form-select mb-3" aria-label="Default select example">
    @foreach($categorias as $c)
    <option value="{{ $c->id }}"
    {{ ($c->id == $p->categoria_id ? "selected" : "" ) }}
    >{{ $c->nome }}</option>
    @endforeach
    </select>

    <input type="submit" value="Salvar" 
        class="btn btn-success" />
</form>
@endsection