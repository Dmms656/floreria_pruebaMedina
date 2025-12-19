@extends('layout')

@section('content')

    @if(session('success'))
        <div class="alert alert-success shadow-sm" style="border-radius:10px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 style="color:#b2184c; font-weight:bold;">
            Pedidos Activos
        </h3>

        <div class="d-flex gap-2">

            <a href="{{ route('pedidos.archivados') }}"
               class="btn btn-outline-secondary"
               style="border-radius:30px;">
                Ver Archivados
            </a>

            <a href="{{ route('pedidos.create') }}"
               class="btn btn-primary"
               style="border-radius:30px; background:#b2184c; border:none;">
                Nuevo Pedido
            </a>

        </div>

    </div>

    <table class="table table-hover shadow-sm"
           style="border-radius:20px; overflow:hidden; background:white;">

        <thead style="background:#7b113a; color:white;">
        <tr>
            <th>Cliente</th>
            <th>Tipo de Arreglo</th>
            <th>Fecha de Entrega</th>
            <th>Estado</th>
            <th class="text-center">Acciones</th>
            <th class="text-center" style="width: 120px;">Archivar</th>
        </tr>
        </thead>

        <tbody>

        @forelse($pedidos as $pedido)
            <tr style="vertical-align: middle;">

                {{-- Cliente --}}
                <td style="font-weight:bold; color:#7b113a;">
                    {{ $pedido->cliente }}
                </td>

                {{-- Tipo --}}
                <td>
                    {{ $pedido->tipo_arreglo }}
                </td>

                {{-- Fecha --}}
                <td>
                    {{ $pedido->fecha_entrega->format('d/m/Y') }}
                </td>

                {{-- Estado --}}
                <td>
                    @if($pedido->estado === 'archivado')
                        <span class="badge text-bg-secondary px-3 py-2"
                              style="border-radius:20px;">
                        Archivado
                    </span>
                    @elseif($pedido->estado === 'armando')
                        <span class="badge"
                              style="background:#b2184c; border-radius:20px; padding:8px 12px;">
                        Armando
                    </span>
                    @elseif($pedido->estado === 'entregado')
                        <span class="badge"
                              style="background:#2b9348; border-radius:20px; padding:8px 12px;">
                        Entregado
                    </span>
                    @else
                        <span class="badge"
                              style="background:#f7b267; border-radius:20px; padding:8px 12px;">
                        Pendiente
                    </span>
                    @endif
                </td>

                {{-- ACCIONES: ver / editar --}}
                <td class="text-center">

                    <a href="{{ route('pedidos.show', $pedido) }}"
                       class="btn btn-info btn-sm"
                       style="border-radius:30px;">
                        Ver
                    </a>

                    <a href="{{ route('pedidos.edit', $pedido) }}"
                       class="btn btn-warning btn-sm"
                       style="border-radius:30px;">
                        Editar
                    </a>

                </td>

                {{-- ARCHIVAR SOLO --}}
                <td class="text-center">

                    @if($pedido->estado !== 'archivado')
                        <form action="{{ route('pedidos.destroy',$pedido) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    style="border-radius:30px;"
                                    onclick="return confirm('¿Archivar pedido?')">
                                Archivar
                            </button>

                        </form>
                    @endif

                </td>

            </tr>

        @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-4">
                    No hay pedidos activos
                </td>
            </tr>
        @endforelse

        </tbody>
    </table>

    <div class="mt-3">
        {{ $pedidos->links() }}
    </div>

@endsection
