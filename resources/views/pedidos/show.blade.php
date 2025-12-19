@extends('layout')

@section('content')

    <h3>Detalle del Pedido #{{ $pedido->id }}</h3>

    <div class="card">
        <div class="card-body">

            <p><strong>Cliente:</strong> {{ $pedido->cliente }}</p>
            <p><strong>Teléfono:</strong> {{ $pedido->telefono }}</p>
            <p><strong>Dirección:</strong> {{ $pedido->direccion }}</p>
            <p><strong>Tipo de Arreglo:</strong> {{ $pedido->tipo_arreglo }}</p>
            <p><strong>Fecha Entrega:</strong> {{ $pedido->fecha_entrega->format('d/m/Y') }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($pedido->estado) }}</p>
            <p><strong>Notas:</strong> {{ $pedido->notas }}</p>

            <p><strong>Registrado:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>

            <p><strong>Última modificación:</strong>
                {{ $pedido->updated_at->format('d/m/Y H:i') }}
            </p>

            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                Volver
            </a>

            <a href="{{ route('pedidos.edit',$pedido) }}" class="btn btn-warning">
                Editar
            </a>

        </div>
    </div>

@endsection
