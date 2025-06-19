@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $videojuego->nombre }}</h1>

    <div class="row">
        <div class="col-md-6">
            <!-- Verificar si existe una imagen -->
            @if($videojuego->imagen)
                <img src="{{ asset('storage/' . $videojuego->imagen) }}" alt="{{ $videojuego->nombre }}" class="img-fluid">
            @else
                <p>No hay imagen disponible para este videojuego.</p>
            @endif
        </div>
        <div class="col-md-6">
            <p><strong>Descripción:</strong> {{ $videojuego->descripcion }}</p>
            <p><strong>Precio:</strong> ${{ number_format($videojuego->precio, 2) }}</p>
            <p><strong>Plataforma:</strong> {{ $videojuego->plataforma }}</p>
            <p><strong>Categoría:</strong> {{ $videojuego->categoria->nombre }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('videojuegos.edit', $videojuego) }}" class="btn btn-warning">Editar Videojuego</a>
        
        <form action="{{ route('videojuegos.destroy', $videojuego) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este videojuego?')">Eliminar Videojuego</button>
        </form>
    </div>

    <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary mt-3">Volver a la Lista</a>
</div>
@endsection
