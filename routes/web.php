<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('cliente')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');

    Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/store', [ClienteController::class, 'store'])->name('cliente.store');


    Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('/update', [ClienteController::class, 'update'])->name('cliente.update');

    Route::delete('/delete/{id}', [ClienteController::class, 'destroy'])->name('cliente.delete');
});

Route::prefix('produto')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
});

Route::prefix('venda')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('venda.index');
});
