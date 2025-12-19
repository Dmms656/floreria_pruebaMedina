<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return redirect()->route('pedidos.index');
});

// Ruta para ver pedidos archivados
Route::get('pedidos/archivados',
    [PedidoController::class, 'archivados'])
    ->name('pedidos.archivados');

//CRUD completo de pedidos
Route::resource('pedidos', PedidoController::class);
