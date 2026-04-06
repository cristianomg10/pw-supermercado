@extends('main')

@section('titulo', 'Lista de Produtos')

@section('conteudo')
<h1>Produtos</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Estoque</th>
            <th>Valor</th>
            <th>Data criação</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $p)
        <tr> 
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->estoque }}</td>
            <td>{{ $p->valor }}</td>
            <td>{{ $p->created_at }}</td>
            <td>
                <a href="{{ route('prod.edit', ['id' => $p->id]) }}" 
                    class="btn btn-warning">
                    Alterar</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $p->id }}">
                Launch demo modal
                </button>
            </td>
        </tr>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
        @endforeach
    </tbody>
</table>

<div>
    <a class="btn btn-success" 
        href="{{ route('prod.novo') }}">
        Novo produto</a>
</div>
@endsection