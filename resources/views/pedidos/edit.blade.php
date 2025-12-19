@extends('layout')

@section('content')

    <h3>Editar Pedido</h3>

    <form action="{{ route('pedidos.update',$pedido) }}" method="POST">
        @csrf
        @method('PUT')

        @include('pedidos.form')

    </form>

@endsection
