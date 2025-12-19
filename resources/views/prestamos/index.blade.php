@extends('layout.app')

@section('contenido')

    <div class="container mt-4">
        <h1 class="mb-4">Lista de Préstamos</h1>

        <a href="{{ route('prestamos.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Préstamo</a>



    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Actualiza</th>
                    <th>Eliminar</th>
                    <th>ID</th>
                    <th>Libro</th>
                    <th>Lector</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha Límite de Devolución</th>
                    <th>Fecha de Devolución Real</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td><a href="{{ route('prestamos.edit', $prestamo->id) }}"  class="btn btn-sm btn-warning" >
                            Editar
                        </a> 
                </td>
                <td>
                    <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                        class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                    </form>
                </td>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{ $prestamo->libro_id}}</td>
                        <td>{{ $prestamo->lector_id }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_limite_devolucion }}</td>
                        <td>{{ $prestamo->fecha_devolucion_real }}</td>
                        <td>{{ $prestamo->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
@endsection