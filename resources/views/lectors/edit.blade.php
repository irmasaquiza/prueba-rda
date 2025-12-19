@extends('layout.app')
@section('contenido')

    <form action="{{ route('lectors.update', $lector->id) }}" method="POST" class="w-50 mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ $lector->nombre }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ $lector->email }}">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $lector->telefono }}">
        </div>
        
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $lector->direccion }}">
        </div>



        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</form>