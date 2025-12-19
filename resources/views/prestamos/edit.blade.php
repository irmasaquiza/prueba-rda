@extends('layout.app')

@section('contenido')
    <h1 class="text-center">Editar Préstamo</h1>

    <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST" class="w-50 mx-auto">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="libro_id" class="form-label">Libro</label>
            <select class="form-control" id="libro_id" name="libro_id" required>
                <option value="">Seleccione un libro</option>
                @foreach($libros as $libro)
                    <option value="{{ $libro->id }}" 
                        {{ old('libro_id', $prestamo->libro_id) == $libro->id ? 'selected' : '' }}>
                        {{ $libro->titulo }} - {{ $libro->autor }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="lector_id" class="form-label">Lector</label>
            <select class="form-control" id="lector_id" name="lector_id" required>
                <option value="">Seleccione un lector</option>
                @foreach($lectors as $lector)
                    <option value="{{ $lector->id }}" 
                        {{ old('lector_id', $prestamo->lector_id) == $lector->id ? 'selected' : '' }}>
                        {{ $lector->nombre }} - {{ $lector->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
            <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" 
                   value="{{ old('fecha_prestamo', $prestamo->fecha_prestamo) }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_limite_devolucion" class="form-label">Fecha Límite de Devolución</label>
            <input type="date" class="form-control" id="fecha_limite_devolucion" name="fecha_limite_devolucion" 
                   value="{{ old('fecha_limite_devolucion', $prestamo->fecha_limite_devolucion) }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_devolucion_real" class="form-label">Fecha de Devolución Real</label>
            <input type="date" class="form-control" id="fecha_devolucion_real" name="fecha_devolucion_real" 
                   value="{{ old('fecha_devolucion_real', $prestamo->fecha_devolucion_real) }}">
            <small class="text-muted">Dejar vacío si aún no se ha devuelto</small>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="prestado" {{ old('estado', $prestamo->estado) == 'prestado' ? 'selected' : '' }}>
                    Prestado
                </option>
                <option value="devuelto" {{ old('estado', $prestamo->estado) == 'devuelto' ? 'selected' : '' }}>
                    Devuelto
                </option>
                <option value="atrasado" {{ old('estado', $prestamo->estado) == 'atrasado' ? 'selected' : '' }}>
                    Atrasado
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Préstamo</button>
        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection