<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membro extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'igreja_id',
        'nome',
        'data_nascimento',
        'sexo',
        'telefone',
        'email',
        'cpf',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'data_entrada',
        'status',
        'observacoes',
    ];

    protected function casts(): array
    {
        return [
            'data_nascimento' => 'date',
            'data_entrada' => 'date',
        ];
    }

    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function funcoes(): BelongsToMany
    {
        return $this->belongsToMany(
            Funcao::class,
            'membro_funcao'
        )
            ->withPivot([
                'data_inicio',
                'data_fim',
                'ativo',
            ])
            ->withTimestamps();
    }

    public function redesSupervisionadas(): BelongsToMany
    {
        return $this->belongsToMany(
            Rede::class,
            'rede_supervisores',
            'membro_id',
            'rede_id'
        )->withTimestamps();
    }

    public function celulas(): BelongsToMany
    {
        return $this->belongsToMany(
            Celula::class,
            'celula_membros',
            'membro_id',
            'celula_id'
        )
            ->using(CelulaMembro::class)
            ->withPivot([
                'funcao',
                'data_entrada',
            ])
            ->withTimestamps();
    }

        public function solicitacoesCelula(): HasMany
    {
        return $this->hasMany(
            SolicitacaoCelula::class,
            'membro_id'
        );
    }

        public function solicitacoesCelulaAnalisadas(): HasMany
    {
        return $this->hasMany(
            SolicitacaoCelula::class,
            'analisado_por'
        );
    }
}