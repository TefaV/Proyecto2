@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Categoría: {{ $categoria->nombre }}</h1>

    <p><strong>Descripción:</strong> {{ $categoria->descripcion ?? 'No hay descripción disponible.' }}</p>

    <h3 class="mt-4">Videojuegos en esta Categoría</h3>
    @if($categoria->videojuegos->count())
        <ul class="list-group">
            @foreach($categoria->videojuegos as $videojuego)
                <li class="list-group-item">
                    <a href="{{ route('videojuegos.show', $videojuego) }}">{{ $videojuego->nombre }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay videojuegos en esta categoría.</p>
    @endif

    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-4">Volver a Categorías</a>
</div>
@endsection
