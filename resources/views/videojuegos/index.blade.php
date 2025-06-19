@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Videojuegos</h1>

    <!-- Búsqueda -->
    <form action="{{ route('videojuegos.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Buscar videojuego...">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>

    <!-- Listado de Videojuegos -->
    @if($videojuegos->count())
        <div class="row">
            @foreach($videojuegos as $videojuego)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Aquí se coloca la ruta correcta para la imagen -->
                        <img src="{{ asset('storage/' . $videojuego->imagen) }}" class="card-img-top" alt="{{ $videojuego->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $videojuego->nombre }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($videojuego->descripcion, 100) }}</p>
                            <p class="card-text"><small class="text-muted">Categoría: {{ $videojuego->categoria->nombre }}</small></p>
                            <a href="{{ route('videojuegos.show', $videojuego) }}" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No se encontraron videojuegos.</p>
    @endif

    <!-- Paginación -->
    <div class="mt-4">
        <ul class="pagination justify-content-center">
            @if ($videojuegos->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $videojuegos->previousPageUrl() }}">Anterior</a></li>
            @endif

            @foreach ($videojuegos->getUrlRange(1, $videojuegos->lastPage()) as $page => $url)
                <li class="page-item {{ $videojuegos->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($videojuegos->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $videojuegos->nextPageUrl() }}">Siguiente</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
            @endif
        </ul>
    </div>

    <!-- Botón para agregar nuevo videojuego -->
    <a href="{{ route('videojuegos.create') }}" class="btn btn-success mt-4">Agregar Nuevo Videojuego</a>
</div>
@endsection

<style>
    .card-img-top {
        object-fit: cover;
        height: 200px;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 150px;
    }

    .card-title {
        font-size: 1.2rem;
    }

    .card-text {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-link {
        font-size: 1rem; /* Tamaño de fuente más pequeño */
        padding: 8px 12px; /* Tamaño más pequeño de las casillas */
        border-radius: 50%; /* Flechas redondeadas */
    }

    .pagination .page-item.disabled .page-link {
        color: #ccc; /* Color para los botones deshabilitados */
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff; /* Fondo azul para la página activa */
        border-color: #007bff;
        color: white; /* Color de la página activa */
    }

    .pagination .page-item a {
        color: #007bff; /* Color de las páginas */
        text-decoration: none; /* Eliminar subrayado */
    }

    .pagination .page-item a:hover {
        background-color: #f1f1f1; /* Efecto hover */
        color: #0056b3; /* Color al pasar el mouse */
    }

    .btn-success {
        width: 100%;
    }
</style>
