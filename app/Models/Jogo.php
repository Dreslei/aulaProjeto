<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'requisitos',
        'imagens',
        'data_lancamento',
        'distribuidora_id',
        'genero',
    ];

    public function distribuidora()
    {
        return $this->belongsTo(Distribuidora::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    // public function distribuidora()
    // {
    //     return $this->belongsTo(Distribuidora::class, 'dist_id');
    // }

    // public function genero()
    // {
    //     return $this->belongsTo(Genero::class, 'gen_id');
    // }
    
    
}
