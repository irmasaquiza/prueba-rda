@extends('layout.app')

<h1 class="text-center">Menú Principal</h1>
@section('contenido')
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('libros.index') }}" class="btn btn-primary mb-3 w-25">Gestión de Libros</a>
        <a href="{{ route('lectors.index') }}" class="btn btn-primary mb-3 w-25">Gestión de Lectores</a>
        <a href="{{ route('prestamos.index') }}" class="btn btn-primary mb-3 w-25">Gestión de Préstamos</a>
    </div>