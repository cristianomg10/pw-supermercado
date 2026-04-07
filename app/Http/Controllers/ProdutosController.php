<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutosController extends Controller
{
    function listar(){
        $produtos = Produto::all();

        return view('produtos_listar', 
            ['produtos' => $produtos]);
    }

    function novo(){
        $categorias = Categoria::all();

        return view('produtos_novo', 
            [
                'categorias' => $categorias
            ]);
    }

    function salvar(Request $req, $id=null){
        if ($id) {
            $p = Produto::findOrFail($id);
            $operacao = "alterado";
        } else {
            $p = new Produto();
            $operacao = "inserido";
        }
        $p->nome = $req->nome;
        $p->valor = $req->valor;
        $p->estoque = $req->estoque;
        $p->categoria_id = $req->categoria_id;
        $p->save();

        session()->flash("mensagem", "O produto {$p->nome} foi {$operacao} com sucesso.");

        return redirect('/produtos');
    }

    function edit($id){
        $p = Produto::findOrFail($id);
        $categorias = Categoria::all();

        return view('produtos_edit', 
            [
                'p' => $p, 
                'categorias' => $categorias
            ]);
    }

    function delete($id){
        Produto::findOrFail($id)->delete();

        return redirect('/produtos');
    }
}
