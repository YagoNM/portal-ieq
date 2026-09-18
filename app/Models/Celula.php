<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Celula extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rede_id',
        'nome',
        'descricao',
        'dia_semana',
        'horario',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'latitude',
        'longitude',
        'ativo',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'ativo' => 'boolean',
        ];
    }

    public function rede(): BelongsTo
    {
        return $this->belongsTo(Rede::class);
    }

    public function membros(): BelongsToMany
    {
        return $this->belongsToMany(
            Membro::class,
            'celula_membros',
            'celula_id',
            'membro_id'
        )
            ->using(CelulaMembro::class)
            ->withPivot([
                'funcao',
                'data_entrada',
            ])
            ->withTimestamps();
    }

        public function solicitacoesEntrada(): HasMany
    {
        return $this->hasMany(
            SolicitacaoCelula::class,
            'celula_destino_id'
        );
    }

        public function solicitacoesSaida(): HasMany
    {
        return $this->hasMany(
            SolicitacaoCelula::class,
            'celula_origem_id'
        );
    }
}
