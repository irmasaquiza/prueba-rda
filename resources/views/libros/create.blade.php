@extends('layout.app')

@section('contenido')


<form action="{{route('libros.store')}}" method="POST">
@csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" required>
    </div>
    <div class="mb-3">
        <label for="disponibles" class="form-label">disponibles</label>
        <input type="number" class="form-control" id="disponibles" name="disponibles" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection()



