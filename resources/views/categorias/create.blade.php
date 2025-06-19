@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Categoría</h1>

    <!-- Formulario de creación de categoría -->
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Categoría</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Categoría</button>
    </form>
</div>
@endsection
