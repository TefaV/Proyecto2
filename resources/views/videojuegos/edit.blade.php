@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Videojuego: {{ $videojuego->nombre }}</h1>

    <form action="{{ route('videojuegos.update', $videojuego) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Videojuego</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ old('nombre', $videojuego->nombre) }}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $videojuego->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required value="{{ old('precio', $videojuego->precio) }}">
        </div>

        <div class="mb-3">
            <label for="plataforma" class="form-label">Plataforma</label>
            <select class="form-select" id="plataforma" name="plataforma" required>
                <option value="PC" {{ old('plataforma', $videojuego->plataforma) == 'PC' ? 'selected' : '' }}>PC</option>
                <option value="PlayStation" {{ old('plataforma', $videojuego->plataforma) == 'PlayStation' ? 'selected' : '' }}>PlayStation</option>
                <option value="Xbox" {{ old('plataforma', $videojuego->plataforma) == 'Xbox' ? 'selected' : '' }}>Xbox</option>
                <option value="Switch" {{ old('plataforma', $videojuego->plataforma) == 'Switch' ? 'selected' : '' }}>Switch</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-select" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $videojuego->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Mostrar imagen actual si existe -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (Opcional)</label>
            @if($videojuego->imagen)
                <div class="mb-2">
                    <!-- Mostrar la imagen actual -->
                    <img src="{{ asset('storage/' . $videojuego->imagen) }}" class="img-fluid" alt="Imagen actual" style="max-height: 200px;">
                </div>
            @endif
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Videojuego</button>
    </form>

    <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
</div>
@endsection
