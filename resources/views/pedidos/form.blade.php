<div class="row">

    <div class="col-md-6 mt-2">
        <label class="form-label">Cliente</label>
        <input type="text"
               name="cliente"
               value="{{ old('cliente',$pedido->cliente ?? '') }}"
               class="form-control @error('cliente') is-invalid @enderror">

        @error('cliente')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mt-2">
        <label class="form-label">Teléfono</label>
        <input type="text"
               name="telefono"
               value="{{ old('telefono',$pedido->telefono ?? '') }}"
               class="form-control @error('telefono') is-invalid @enderror">
        @error('telefono')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Dirección</label>
        <input type="text"
               name="direccion"
               value="{{ old('direccion',$pedido->direccion ?? '') }}"
               class="form-control @error('direccion') is-invalid @enderror">
        @error('direccion')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mt-2">
        <label class="form-label">Tipo de Arreglo</label>
        <input type="text"
               name="tipo_arreglo"
               value="{{ old('tipo_arreglo',$pedido->tipo_arreglo ?? '') }}"
               class="form-control @error('tipo_arreglo') is-invalid @enderror">
        @error('tipo_arreglo')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mt-2">
        <label class="form-label">Fecha Entrega</label>
        <input type="date"
               name="fecha_entrega"
               value="{{ old('fecha_entrega',optional($pedido->fecha_entrega ?? null)->format('Y-m-d')) }}"
               class="form-control @error('fecha_entrega') is-invalid @enderror">

        @error('fecha_entrega')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <div class="col-md-6 mt-2">
        <label class="form-label">Estado</label>
        <select name="estado"
                class="form-control @error('estado') is-invalid @enderror">
            <option value="pendiente"   {{ old('estado',$pedido->estado ?? '') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="armando"     {{ old('estado',$pedido->estado ?? '') == 'armando' ? 'selected' : '' }}>Armando</option>
            <option value="entregado"   {{ old('estado',$pedido->estado ?? '') == 'entregado' ? 'selected' : '' }}>Entregado</option>
        </select>

        @error('estado')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-12 mt-2">
        <label class="form-label">Notas</label>
        <textarea name="notas"
                  rows="3"
                  class="form-control">{{ old('notas',$pedido->notas ?? '') }}</textarea>
    </div>

</div>

<div class="mt-4">
    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
