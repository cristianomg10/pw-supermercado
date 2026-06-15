<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Produto();
        $p->nome = $request->input('nome');
        $p->valor = $request->input('valor');
        $p->estoque = $request->input('estoque');
        $p->categoria_id = $request->input('categoria_id');
        
        $p->save();
        return $p;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Produto::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p = Produto::findOrFail($id);
        $p->nome = $request->input('nome');
        $p->valor = $request->input('valor');
        $p->estoque = $request->input('estoque');
        $p->categoria_id = $request->input('categoria_id');
        
        $p->save();
        return $p;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Produto::findOrFail($id);
        $p->delete();

        return ["mensagem" => "Produto excluído com sucesso"];
    }
}
