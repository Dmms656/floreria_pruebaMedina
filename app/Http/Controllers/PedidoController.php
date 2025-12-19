<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::whereNull('archived_at')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pedidos.index', compact('pedidos'));
    }

    public function archivados()
    {
        $pedidos = Pedido::whereNotNull('archived_at')
            ->orderBy('archived_at', 'desc')
            ->paginate(10);

        return view('pedidos.archivados', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente'       => 'required|max:100',
            'telefono'      => 'required|max:20',
            'direccion'     => 'required|max:150',
            'tipo_arreglo'  => 'required|max:100',
            'fecha_entrega' => 'required|date|after:yesterday',
            'estado'        => 'required|in:pendiente,armando,entregado'
        ]);

        Pedido::create($request->all());

        return redirect()
            ->route('pedidos.index')
            ->with('success', 'Pedido registrado exitosamente');
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'cliente'       => 'required|max:100',
            'telefono'      => 'required|max:20',
            'direccion'     => 'required|max:150',
            'tipo_arreglo'  => 'required|max:100',
            'fecha_entrega' => 'required|date',
            'estado'        => 'required|in:pendiente,armando,entregado,archivado'
        ]);

        $pedido->update($request->all());

        return redirect()
            ->route('pedidos.index')
            ->with('success', 'Pedido actualizado correctamente');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->update([
            'archived_at' => now(),
            'estado'      => 'archivado'
        ]);

        return redirect()
            ->route('pedidos.index')
            ->with('success', 'Pedido archivado');
    }
}
