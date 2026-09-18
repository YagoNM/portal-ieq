<?php

namespace App\Models;

use App\Enums\StatusSolicitacaoCelula;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolicitacaoCelula extends Model
{
    protected $table = 'solicitacoes_celula';

    protected $fillable = [
        'membro_id',
        'celula_origem_id',
        'celula_destino_id',
        'status',
        'observacao',
        'analisado_por',
        'analisado_em',
    ];

    protected function casts(): array
    {
        return [
            'status' => StatusSolicitacaoCelula::class,
            'analisado_em' => 'datetime',
        ];
    }

    public function membro(): BelongsTo
    {
        return $this->belongsTo(Membro::class);
    }

    public function celulaOrigem(): BelongsTo
    {
        return $this->belongsTo(
            Celula::class,
            'celula_origem_id'
        );
    }

    public function celulaDestino(): BelongsTo
    {
        return $this->belongsTo(
            Celula::class,
            'celula_destino_id'
        );
    }

    public function analisador(): BelongsTo
    {
        return $this->belongsTo(
            Membro::class,
            'analisado_por'
        );
    }
}