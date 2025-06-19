<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Ejecutar la siembra de la base de datos.
     *
     * @return void
     */
    public function run()
    {
        // Lista de categorías de Steam
        $categorias = [
            ['nombre' => 'Acción', 'descripcion' => 'Juegos llenos de acción, combate y adrenalina.'],
            ['nombre' => 'Aventura', 'descripcion' => 'Juegos que ofrecen exploración y descubrimiento.'],
            ['nombre' => 'Estrategia', 'descripcion' => 'Juegos que requieren planificación y toma de decisiones.'],
            ['nombre' => 'RPG', 'descripcion' => 'Juegos de rol donde los jugadores asumen un papel y toman decisiones.'],
            ['nombre' => 'Indie', 'descripcion' => 'Juegos desarrollados por pequeños estudios independientes.'],
            ['nombre' => 'Multijugador', 'descripcion' => 'Juegos que permiten a múltiples jugadores interactuar.'],
            ['nombre' => 'Simulación', 'descripcion' => 'Juegos que replican situaciones del mundo real o ficticio.'],
            ['nombre' => 'Deportes', 'descripcion' => 'Juegos que simulan actividades deportivas reales.'],
            ['nombre' => 'Lucha', 'descripcion' => 'Juegos centrados en combates cuerpo a cuerpo.'],
            ['nombre' => 'Casual', 'descripcion' => 'Juegos fáciles de jugar, adecuados para jugadores casuales.'],
            ['nombre' => 'Co-op', 'descripcion' => 'Juegos que permiten a los jugadores colaborar juntos en lugar de competir.'],
            ['nombre' => 'Shooter', 'descripcion' => 'Juegos que se centran en disparos y combates a distancia.'],
            ['nombre' => 'Sandbox', 'descripcion' => 'Juegos con mundo abierto donde el jugador tiene libertad de acción.'],
            ['nombre' => 'Puzles', 'descripcion' => 'Juegos que desafían la lógica y las habilidades de resolución de problemas.'],
            ['nombre' => 'Horror', 'descripcion' => 'Juegos diseñados para asustar y crear tensión.'],
            ['nombre' => 'Tercera persona', 'descripcion' => 'Juegos donde se ve al personaje principal desde una perspectiva en tercera persona.'],
            ['nombre' => 'Construcción', 'descripcion' => 'Juegos que se centran en construir y gestionar recursos.'],
            ['nombre' => 'Juego de mesa', 'descripcion' => 'Juegos basados en la simulación de juegos de mesa tradicionales.'],
            ['nombre' => 'RPG de acción', 'descripcion' => 'Juegos que combinan elementos de RPG y acción.'],
            ['nombre' => 'Aventura narrativa', 'descripcion' => 'Juegos con una fuerte narrativa y enfoque en la historia.'],
            ['nombre' => 'Plataformas', 'descripcion' => 'Juegos donde se saltan entre plataformas en entornos 2D o 3D.'],
            ['nombre' => 'Mapa abierto', 'descripcion' => 'Juegos que tienen un mundo abierto donde los jugadores pueden explorar.'],
            ['nombre' => 'Supervivencia', 'descripcion' => 'Juegos centrados en la supervivencia en un entorno hostil.'],
            ['nombre' => 'Hack and Slash', 'descripcion' => 'Juegos donde el combate se centra en ataques rápidos y combos.'],
            ['nombre' => 'Card Game', 'descripcion' => 'Juegos de cartas, que pueden ser coleccionables o de estrategia.'],
            ['nombre' => 'Música', 'descripcion' => 'Juegos que involucran música y ritmo.'],
            ['nombre' => 'Roguelike', 'descripcion' => 'Juegos de exploración de mazmorras con generación aleatoria y muerte permanente.'],
            ['nombre' => 'Auto Battler', 'descripcion' => 'Juegos de batallas automáticas donde el jugador configura y observa.'],
            ['nombre' => 'Textos interactivos', 'descripcion' => 'Juegos basados en narrativa interactiva donde las decisiones afectan la historia.'],
            ['nombre' => 'Estrategia en tiempo real', 'descripcion' => 'Juegos donde la estrategia se desarrolla en tiempo real.'],
        ];

        // Insertar las categorías en la base de datos
        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
