<?php

namespace Database\Seeders;

use App\Models\Jogador;
use Illuminate\Database\Seeder;

class JogadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jogador::create([
            'nome'   => 'player1',
            'ataque' => 70,
            'defesa' => 80
        ]);
    }
}
