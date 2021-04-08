<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogador'; //nome da tabela no BD
    protected $fillable = ['nome','ataque','defesa','pontos_vida'];
    //tenha atencao em usar o fillable pela vulnerabilidade de atribuicao em massa! 
    //leia mais em https://laravel.com/docs/8.x/eloquent#mass-assignment

    
    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'id_jogador'); //relacao 1->N para Jogador
    }
}
