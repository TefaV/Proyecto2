@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Nuevo Videojuego</h1>

    <form action="{{ route('videojuegos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Videojuego</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ old('nombre') }}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required value="{{ old('precio') }}">
        </div>

        <div class="mb-3">
            <label for="plataforma" class="form-label">Plataforma</label>
            <select class="form-select" id="plataforma" name="plataforma" required>
                <option value="PC" {{ old('plataforma') == 'PC' ? 'selected' : '' }}>PC</option>
                <option value="PlayStation" {{ old('plataforma') == 'PlayStation' ? 'selected' : '' }}>PlayStation</option>
                <option value="Xbox" {{ old('plataforma') == 'Xbox' ? 'selected' : '' }}>Xbox</option>
                <option value="Switch" {{ old('plataforma') == 'Switch' ? 'selected' : '' }}>Switch</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-select" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (Opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Videojuego</button>
    </form>

    <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
</div>
@endsection
