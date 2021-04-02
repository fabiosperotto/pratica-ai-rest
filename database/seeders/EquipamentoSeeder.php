<?php

namespace Database\Seeders;

use App\Models\Equipamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $last = DB::table('jogador')->latest()->first();
        Equipamento::create([
            'id_jogador' => $last->id,
            'descricao' => 'espada',
            'bonus_ataque' => 10,
            'bonus_defesa' => 5
        ]);   
        Equipamento::create([
            'id_jogador' => $last->id,
            'descricao' => 'escudo',
            'bonus_ataque' => 2,
            'bonus_defesa' => 20
        ]);      
      
    }
}
