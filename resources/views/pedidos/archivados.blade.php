@extends('layout')

@section('content')

    @if(session('success'))
        <div class="alert alert-success shadow-sm" style="border-radius:10px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 style="color:#b2184c; font-weight:bold;">
            Pedidos Archivados
        </h3>

        <a href="{{ route('pedidos.index') }}"
           class="btn btn-dark"
           style="border-radius:30px; background:#7b113a; border:none;">
            Volver a Activos
        </a>
    </div>

    <div class="table-responsive">

        <table class="table table-hover shadow-sm"
               style="border-radius:20px; overflow:hidden; background:white;">

            <thead style="background:#7b113a; color:white;">
            <tr>
                <th>Cliente</th>
                <th>Arreglo</th>
                <th>Archivado el</th>
                <th>Estado</th>
                <th class="text-center" style="width:120px;">Eliminar</th>
            </tr>
            </thead>

            <tbody>

            @forelse($pedidos as $pedido)
                <tr style="vertical-align: middle;">

                    <td style="font-weight:bold; color:#7b113a;">
                        {{ $pedido->cliente }}
                    </td>

                    <td>
                        {{ $pedido->tipo_arreglo }}
                    </td>

                    <td>
                        {{ $pedido->archived_at->format('d/m/Y H:i') }}
                    </td>

                    <td>
                        <span class="badge bg-secondary"
                              style="border-radius:20px; padding:8px 12px;">
                            Archivado
                        </span>
                    </td>

                    <td class="text-center">
                        <form action="{{ route('pedidos.forceDelete', $pedido) }}"
                              method="POST"
                              onsubmit="return confirm('¿Eliminar pedido definitivamente? Esta acción no se puede deshacer.')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    style="border-radius:30px;">
                                Eliminar
                            </button>

                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        No hay pedidos archivados
                    </td>
                </tr>
            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-3">
        {{ $pedidos->links() }}
    </div>

@endsection
