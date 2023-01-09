<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produto::paginate(10);

        return view('produto.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Produto::create([
            'nome' => $request->name,
            'preco' => $request->preco,
            'quantidade' =>$request->quantidade,

        ]);


        return Redirect::route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @param  int $id
     *@return \Illuminate\Http\Response
     *
     */
    public function edit(Produto $produto, $id)
    {
        $data = Produto::query()->find($id);
        return view('produto.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $id = $request->id;

        Produto::find($id)->update([
            'nome' => $request->name,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        return Redirect::route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto, $id)
    {
        Produto::destroy($id);

        return Redirect::route('produto.index');
    }
}
