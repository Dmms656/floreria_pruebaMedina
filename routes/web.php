<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return redirect()->route('pedidos.index');
});

Route::get('pedidos/archivados',
    [PedidoController::class, 'archivados'])
    ->name('pedidos.archivados');

Route::delete(
    'pedidos/{pedido}/delete-permanent',
    [PedidoController::class, 'forceDelete'])
    ->name('pedidos.forceDelete');

Route::resource('pedidos', PedidoController::class);
