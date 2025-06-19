<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideojuegoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $videojuegos = Videojuego::with('categoria')
            ->when($search, function($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('videojuegos.index', compact('videojuegos'));
    }

    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', compact('videojuego'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('videojuegos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'plataforma' => 'required|in:PC,PlayStation,Xbox,Switch',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $videojuego = new Videojuego($validated);

        // Verificar si hay una imagen y guardarla
        if ($request->hasFile('imagen')) {
            $videojuego->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        $videojuego->save();

        return redirect()->route('videojuegos.index');
    }

    public function edit(Videojuego $videojuego)
    {
        $categorias = Categoria::all();
        return view('videojuegos.edit', compact('videojuego', 'categorias'));
    }

    public function update(Request $request, Videojuego $videojuego)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'plataforma' => 'required|in:PC,PlayStation,Xbox,Switch',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

// Eliminar la imagen anterior si existe
if ($request->hasFile('imagen')) {
    // Si el videojuego ya tiene una imagen almacenada, eliminarla
    if ($videojuego->imagen) {
        // Usar el disco 'public' para eliminar la imagen
        Storage::disk('public')->delete('imagenes/' . $videojuego->imagen);
    }

    // Guardar la nueva imagen
    $videojuego->imagen = $request->file('imagen')->store('imagenes', 'public');
}

// Actualizar el videojuego con los nuevos datos
$videojuego->update($validated);

return redirect()->route('videojuegos.show', $videojuego);

    }

    public function destroy(Videojuego $videojuego)
    {
        // Eliminar la imagen del videojuego antes de eliminar el registro
        if ($videojuego->imagen) {
            Storage::delete('public/' . $videojuego->imagen);
        }

        $videojuego->delete();

        return redirect()->route('videojuegos.index');
    }
}
