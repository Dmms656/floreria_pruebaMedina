<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'cliente',
        'telefono',
        'direccion',
        'tipo_arreglo',
        'fecha_entrega',
        'estado',
        'notas',
        'archived_at'
    ];

    protected $casts = [
        'fecha_entrega' => 'date',
        'created_at' => 'datetime',
        'archived_at' => 'datetime'
    ];
}
