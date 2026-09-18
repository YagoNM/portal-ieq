<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Funcao extends Model
{
    protected $table = 'funcoes';

    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'ativa',
    ];

    protected function casts(): array
    {
        return [
            'ativa' => 'boolean',
        ];
    }

    public function membros(): BelongsToMany
    {
        return $this->belongsToMany(
            Membro::class,
            'membro_funcao'
        )
            ->withPivot([
                'data_inicio',
                'data_fim',
                'ativo',
            ])
            ->withTimestamps();
    }
}