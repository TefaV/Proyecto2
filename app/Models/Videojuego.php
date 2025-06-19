<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'plataforma', 'imagen', 'categoria_id'];

    // Relación: Un videojuego pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
