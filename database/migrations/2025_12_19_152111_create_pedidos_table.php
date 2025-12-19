<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {

            $table->id();

            $table->string('cliente', 100);
            $table->string('telefono', 20);
            $table->string('direccion', 150);
            $table->string('tipo_arreglo', 100);

            $table->date('fecha_entrega');

            // en PostgreSQL NO existe enum -> usar columna string
            $table->string('estado', 20)->default('pendiente');

            $table->text('notas')->nullable();

            $table->timestamp('archived_at')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
