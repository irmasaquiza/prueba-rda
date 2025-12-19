@extends('layout.app')

@section('contenido')

   <h1>Lista de Lectores</h1>
    <p>Bienvenido a la lista de lectores disponibles en la biblioteca.</p>

    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Lectores</h1>

    <a href="{{ route('lectors.create') }}" class="btn btn-primary">
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
                <th>Nombre</th>
                <th>Telefono</th>
                <th>email</th>
                <th>direccion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lectors as $lector)
            <tr>
                <td><a href="{{ route('lectors.edit', $lector->id) }}"  class="btn btn-sm btn-warning" >
                            Editar
                        </a >
                </td>
                <td>
                    <form action="{{ route('lectors.destroy', $lector->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                        class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                    </form>
                </td>
                <td>{{ $lector->id }}</td>
                <td>{{ $lector->nombre }}</td>
                <td>{{ $lector->telefono }}</td>
                <td>{{ $lector->email }}</td>
                <td>{{ $lector->direccion }}</td>
            </tr>
            @endforeach
        </tbody>

    </div>

@endsection