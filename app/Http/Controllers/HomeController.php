<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $cliente = Cliente::with('vendas')->get();

        dd($cliente);

        $hour = new DateTime('now');
        $hour = $hour->format('H');

        $name = User::all()[0]->name;

        if ($hour >= 6 && $hour < 12) {
            $message = 'Bom dia ' . $name . '!';
        } elseif ($hour >= 12 && $hour < 18) {
            $message = 'Boa tarde ' . $name . '!';
        } else {
            $message = 'Boa noite ' . $name . '!';
        }

        return view('home', compact('message'));
    }
}
