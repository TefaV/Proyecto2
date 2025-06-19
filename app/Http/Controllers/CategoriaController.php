<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Mostrar todas las categorías.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Mostrar formulario para crear una nueva categoría.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Guardar una nueva categoría en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Mostrar una categoría específica (y sus videojuegos).
     */
    public function show(Categoria $categoria)
    {
        $videojuegos = $categoria->videojuegos()->paginate(10);
        return view('categorias.show', compact('categoria', 'videojuegos'));
    }

    /**
     * Mostrar formulario para editar una categoría.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Actualizar una categoría en la base de datos.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Eliminar una categoría de la base de datos.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría eliminada exitosamente.');
    }
}
