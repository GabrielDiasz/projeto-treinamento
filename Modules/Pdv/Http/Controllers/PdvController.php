<?php

namespace Modules\Pdv\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaProduto;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PdvController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (session()->get('venda_id')) {
            $venda = Venda::with('vendaProdutos', 'produtos')->find(session()->get('venda_id'));
            $total = $venda->total;
        }
        return view('pdv::index', compact('total', 'venda'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pdv::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $venda_id = session()->get('venda_id');

        $product = Produto::where('codebar', $request->codebar)->first();

        if ($venda_id == null) {
            $venda = Venda::create([
                'total' => 0
            ]);

            $venda_id = $venda->id;

            session()->put('venda_id', $venda_id);
        }

        VendaProduto::create([
            'produto_id' => $product->id,
            'venda_id' => $venda_id,
            'qtd' => $request->qtd
        ]);

        $venda = Venda::find($venda_id);

        $total = $venda->total;

        $total = $total + ($product->preco * $request->qtd);

        $venda->update([
            'total' => $total
        ]);

        return response()->json($venda);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('pdv::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('pdv::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function listProductSale()
    {
        $venda = Venda::with('vendaProdutos', 'produtos')->find(session()->get('venda_id'));

        $html = view('pdv::partial.table', compact('venda'))->render();

        return response()->json($html);
    }
}
