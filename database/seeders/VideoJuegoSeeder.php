<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Videojuego;
use Illuminate\Database\Seeder;

class VideojuegoSeeder extends Seeder
{
    /**
     * Ejecutar la siembra de la base de datos.
     *
     * @return void
     */
    public function run()
    {
        // Lista de videojuegos a insertar
        $videojuegos = [
            ['nombre' => 'The Witcher 3', 'descripcion' => 'Un juego de rol épico con un mundo abierto masivo.', 'precio' => 49.99, 'plataforma' => 'PC', 'categoria_id' => 1, 'imagen' => 'the_witcher_3.jpg'], // Acción
            ['nombre' => 'The Legend of Zelda: Breath of the Wild', 'descripcion' => 'Aventura y exploración en un vasto mundo abierto.', 'precio' => 59.99, 'plataforma' => 'Switch', 'categoria_id' => 2], // Aventura
            ['nombre' => 'Age of Empires IV', 'descripcion' => 'Estrategia en tiempo real donde gestionas tu imperio.', 'precio' => 39.99, 'plataforma' => 'PC', 'categoria_id' => 3], // Estrategia
            ['nombre' => 'The Elder Scrolls V: Skyrim', 'descripcion' => 'RPG de acción con un mundo vasto y épico.', 'precio' => 29.99, 'plataforma' => 'PC', 'categoria_id' => 4], // RPG
            ['nombre' => 'Hades', 'descripcion' => 'Un juego de acción roguelike en el inframundo griego.', 'precio' => 24.99, 'plataforma' => 'PC', 'categoria_id' => 5], // Indie
            ['nombre' => 'Among Us', 'descripcion' => 'Juego multijugador de deducción social.', 'precio' => 5.00, 'plataforma' => 'PC', 'categoria_id' => 6], // Multijugador
            ['nombre' => 'The Sims 4', 'descripcion' => 'Simulación de vida donde creas y gestionas personajes.', 'precio' => 39.99, 'plataforma' => 'PC', 'categoria_id' => 7], // Simulación
            ['nombre' => 'FIFA 22', 'descripcion' => 'Simulación de fútbol de alta calidad.', 'precio' => 59.99, 'plataforma' => 'PC', 'categoria_id' => 8], // Deportes
            ['nombre' => 'Mortal Kombat 11', 'descripcion' => 'Un juego de lucha lleno de acción y violencia.', 'precio' => 49.99, 'plataforma' => 'PC', 'categoria_id' => 9], // Lucha
            ['nombre' => 'Stardew Valley', 'descripcion' => 'Un juego de rol de simulación en una granja.', 'precio' => 14.99, 'plataforma' => 'PC', 'categoria_id' => 10], // Casual
            ['nombre' => 'Overcooked 2', 'descripcion' => 'Juego cooperativo de cocina caótica y divertida.', 'precio' => 24.99, 'plataforma' => 'PC', 'categoria_id' => 11], // Co-op
            ['nombre' => 'Call of Duty: Warzone', 'descripcion' => 'Juego de disparos en un mundo abierto con batalla real.', 'precio' => 0.00, 'plataforma' => 'PC', 'categoria_id' => 12], // Shooter
            ['nombre' => 'Minecraft', 'descripcion' => 'Juega en un mundo generado por bloques, explora y construye.', 'precio' => 26.95, 'plataforma' => 'PC', 'categoria_id' => 13], // Sandbox
            ['nombre' => 'Portal 2', 'descripcion' => 'Un juego de puzles con mecánicas de portales.', 'precio' => 9.99, 'plataforma' => 'PC', 'categoria_id' => 14], // Puzles
            ['nombre' => 'Resident Evil Village', 'descripcion' => 'Un juego de horror de supervivencia en primera persona.', 'precio' => 59.99, 'plataforma' => 'PC', 'categoria_id' => 15], // Horror
            ['nombre' => 'Assassin\'s Creed Valhalla', 'descripcion' => 'Juego de aventura en un mundo abierto ambientado en la era vikinga.', 'precio' => 59.99, 'plataforma' => 'PC', 'categoria_id' => 16], // Tercera persona
            ['nombre' => 'SimCity', 'descripcion' => 'Simulación de ciudad donde gestionas la construcción de una ciudad.', 'precio' => 29.99, 'plataforma' => 'PC', 'categoria_id' => 17], // Construcción
            ['nombre' => 'Monopoly Plus', 'descripcion' => 'Juego de mesa digital basado en el popular Monopoly.', 'precio' => 19.99, 'plataforma' => 'PC', 'categoria_id' => 18], // Juego de mesa
            ['nombre' => 'Dark Souls III', 'descripcion' => 'RPG de acción desafiante con combates difíciles.', 'precio' => 39.99, 'plataforma' => 'PC', 'categoria_id' => 19], // RPG de acción
            ['nombre' => 'Life is Strange', 'descripcion' => 'Aventura narrativa interactiva con un fuerte enfoque en la historia.', 'precio' => 19.99, 'plataforma' => 'PC', 'categoria_id' => 20], // Aventura narrativa
            ['nombre' => 'Celeste', 'descripcion' => 'Un juego de plataformas desafiante sobre escalar una montaña.', 'precio' => 19.99, 'plataforma' => 'PC', 'categoria_id' => 21], // Plataformas
            ['nombre' => 'Grand Theft Auto V', 'descripcion' => 'Juego de mundo abierto en la ciudad ficticia de Los Santos.', 'precio' => 29.99, 'plataforma' => 'PC', 'categoria_id' => 22], // Mapa abierto
            ['nombre' => 'Subnautica', 'descripcion' => 'Juego de supervivencia bajo el agua en un mundo alienígena.', 'precio' => 29.99, 'plataforma' => 'PC', 'categoria_id' => 23], // Supervivencia
            ['nombre' => 'Diablo III', 'descripcion' => 'Un hack and slash RPG en un mundo oscuro.', 'precio' => 39.99, 'plataforma' => 'PC', 'categoria_id' => 24], // Hack and Slash
            ['nombre' => 'Hearthstone', 'descripcion' => 'Juego de cartas basado en el universo de Warcraft.', 'precio' => 0.00, 'plataforma' => 'PC', 'categoria_id' => 25], // Card Game
            ['nombre' => 'Beat Saber', 'descripcion' => 'Juego de ritmo en VR donde cortas bloques con espadas láser.', 'precio' => 29.99, 'plataforma' => 'PC', 'categoria_id' => 26], // Música
            ['nombre' => 'Dead Cells', 'descripcion' => 'Juego roguelike de acción y plataformas con combate rápido.', 'precio' => 24.99, 'plataforma' => 'PC', 'categoria_id' => 27], // Roguelike
            ['nombre' => 'Auto Chess', 'descripcion' => 'Juega en un auto-battler basado en el Dota 2 mod.', 'precio' => 0.00, 'plataforma' => 'PC', 'categoria_id' => 28], // Auto Battler
            ['nombre' => 'The Banner Saga', 'descripcion' => 'Un juego de rol con narrativa basada en decisiones y batallas tácticas.', 'precio' => 19.99, 'plataforma' => 'PC', 'categoria_id' => 29], // Textos interactivos
            ['nombre' => 'Command & Conquer', 'descripcion' => 'Un juego de estrategia en tiempo real donde debes gestionar recursos y crear ejércitos.', 'precio' => 39.99, 'plataforma' => 'PC', 'categoria_id' => 30], // Estrategia en tiempo real
        ];

        // Insertar los videojuegos en la base de datos
        foreach ($videojuegos as $videojuego) {
            Videojuego::create($videojuego);
        }
    }
}
