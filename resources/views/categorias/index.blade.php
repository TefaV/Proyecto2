@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Categorías</h1>

    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Agregar Nueva Categoría</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($categorias->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay categorías registradas.</p>
    @endif
</div>
@endsection
