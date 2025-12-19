@extends('layout.app')

@section('contenido')
    <h1>Lista de Libros</h1>
    <p>Bienvenido a la lista de libros disponibles en la biblioteca.</p>

    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Libros</h1>

    <a href="{{ route('libros.create') }}" class="btn btn-primary">
        Nuevo
    </a>
    </div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Actualiza</th>
                <th>Eliminar</th>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Cantidad disponibles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td><a href="{{ route('libros.edit', $libro->id) }}"  class="btn btn-sm btn-warning" >
                            Editar
                        </a >
                </td>
                <td>
                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                        class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                    </form>
                </td>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->disponibles}}</td>
            </tr>
            @endforeach
        </tbody>

</div>
@endsection