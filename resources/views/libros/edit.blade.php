@extends('layout.app')


<form action="{{route('libros.update', $libro->id)}}" method="POST">
@method('PUT')
@csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required value="{{ $libro->titulo }}">
    </div>
    <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" required value="{{ $libro->autor }}">
    </div>
    <div class="mb-3">
        <label for="disponibles" class="form-label">disponibles</label>
        <input type="number" class="form-control" id="disponibles" name="disponibles" required value="{{ $libro->disponibles }}">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>



</form>