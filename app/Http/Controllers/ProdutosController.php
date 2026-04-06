<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    function listar(){
        $produtos = Produto::all();

        return view('produtos_listar', 
            ['produtos' => $produtos]);
    }

    function novo(){
        return view('produtos_novo');
    }

    function salvar(Request $req, $id=null){
        if ($id) {
            $p = Produto::findOrFail($id);
        } else {
            $p = new Produto();
        }
        $p->nome = $req->nome;
        $p->valor = $req->valor;
        $p->estoque = $req->estoque;
        $p->save();

        return redirect('/produtos');
    }

    function edit($id){
        $p = Produto::findOrFail($id);

        return view('produtos_edit', ['p' => $p]);
    }

    function delete($id){
        Produto::findOrFail($id)->delete();

        return redirect('/produtos');
    }
}
