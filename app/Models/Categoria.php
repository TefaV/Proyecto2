<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    // Relación: Una categoría tiene muchos videojuegos
    public function videojuegos()
    {
        return $this->hasMany(Videojuego::class);
    }
}
