<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cliente::paginate(10);

        return view('cliente.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $date = new DateTime($request->date);
        $date = $date->format('d/m/Y');

        Cliente::create([
            'nome' => $request->name,
            'cpf' => $request->cpf,
            'data_nascimento' => $date,

        ]);


        return Redirect::route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     */
    public function edit($id)
    {
        $data = Cliente::query()->find($id);
        return view('cliente.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request)
    {
//       dd($request);

//        $request->validate([
//            'id' => 'required',
//            'nome' => 'required',
//            'cpf' => 'required',
//            'data_nascimento' => 'required'
//        ]);

        $id = $request->id;

        $date = new DateTime($request->date);
        $date = $date->format('d/m/Y');

        Cliente::find($id)->update([
            'nome' => $request->name,
            'cpf' => $request->cpf,
            'data_nascimento' => $date
        ]);

        return Redirect::route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroy($id);

        return Redirect::route('cliente.index')->with('message', 'Cliente Excluido Com Sucesso');
    }
}
