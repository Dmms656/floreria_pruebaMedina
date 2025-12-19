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
        $request->validate(
            $this->rules(),
            $this->messages()
        );

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
        $request->validate(
            $this->rules(true),
            $this->messages()
        );

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

    private function rules($isUpdate = false)
    {
        return [
            'cliente' => [
                'required',
                'max:100',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/'
            ],
            'telefono' => [
                'required',
                'digits_between:7,20',
                'regex:/^[0-9]+$/'
            ],
            'direccion' => [
                'required',
                'max:150',
                'regex:/^[A-Za-z0-9ÁÉÍÓÚáéíóúñÑ .#-]+$/'
            ],
            'tipo_arreglo' => [
                'required',
                'max:100',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/'
            ],
            'fecha_entrega' =>
                $isUpdate ? 'required|date' : 'required|date|after:yesterday',

            'estado' =>
                $isUpdate
                    ? 'required|in:pendiente,armando,entregado,archivado'
                    : 'required|in:pendiente,armando,entregado'
        ];
    }

    private function messages()
    {
        return [
            'cliente.required' => 'Debe ingresar el nombre del cliente.',
            'cliente.max' => 'El nombre no debe superar 100 caracteres.',
            'cliente.regex' => 'El nombre solo debe contener letras y espacios.',

            'telefono.required' => 'Debe ingresar un número de teléfono.',
            'telefono.digits_between' => 'El teléfono debe tener entre 7 y 20 dígitos.',
            'telefono.regex' => 'El teléfono solo debe contener números.',

            'direccion.required' => 'Debe ingresar una dirección de entrega.',
            'direccion.max' => 'La dirección no debe superar 150 caracteres.',
            'direccion.regex' => 'La dirección contiene caracteres inválidos.',

            'tipo_arreglo.required' => 'Debe ingresar el tipo de arreglo floral.',
            'tipo_arreglo.max' => 'El tipo de arreglo no debe superar 100 caracteres.',
            'tipo_arreglo.regex' => 'El tipo de arreglo solo debe contener letras y espacios.',

            'fecha_entrega.required' => 'Debe seleccionar una fecha de entrega.',
            'fecha_entrega.date' => 'El formato de la fecha no es válido.',
            'fecha_entrega.after' => 'La fecha de entrega debe ser hoy en adelante.',

            'estado.required' => 'Debe seleccionar un estado válido.',
        ];
    }

    public function forceDelete(Pedido $pedido)
    {
        if ($pedido->archived_at === null) {
            return redirect()
                ->back()
                ->with('success', 'Solo se pueden eliminar pedidos archivados.');
        }

        $pedido->delete();

        return redirect()
            ->route('pedidos.archivados')
            ->with('success', 'Pedido eliminado definitivamente');
    }

}
