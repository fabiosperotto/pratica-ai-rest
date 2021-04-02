<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamento';
    protected $fillable = ['id_jogador','descricao','bonus_ataque','bonus_defesa'];
}
