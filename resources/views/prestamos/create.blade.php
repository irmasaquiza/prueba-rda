@extends('layout.app')

@section('contenido')
    <h1 class="text-center">Crear Préstamo</h1>

    <form action="{{ route('prestamos.store') }}" method="POST" class="w-50 mx-auto">
        @csrf
        
        <div class="mb-3">
            <label for="libro_id" class="form-label">Libro</label>
            <select class="form-control" id="libro_id" name="libro_id" required>
                <option value="">Seleccione un libro</option>
                @foreach($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }} - {{ $libro->autor }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="lector_id" class="form-label">Lector</label>
            <select class="form-control" id="lector_id" name="lector_id" required>
                <option value="">Seleccione un lector</option>
                @foreach($lectors as $lector)
                    <option value="{{ $lector->id }}">{{ $lector->nombre }} - {{ $lector->email }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
            <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" 
                   value="{{ date('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_limite_devolucion" class="form-label">Fecha Límite de Devolución</label>
            <input type="date" class="form-control" id="fecha_limite_devolucion" name="fecha_limite_devolucion" 
                   value="{{ date('Y-m-d', strtotime('+15 days')) }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="prestado" selected>Prestado</option>
                <option value="devuelto">Devuelto</option>
                <option value="atrasado">Atrasado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Préstamo</button>
        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection