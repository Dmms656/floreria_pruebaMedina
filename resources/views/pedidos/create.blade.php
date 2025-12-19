@extends('layout')

@section('content')

    <h3>Nuevo Pedido</h3>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        @include('pedidos.form')

    </form>

@endsection
