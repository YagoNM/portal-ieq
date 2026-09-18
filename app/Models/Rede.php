<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rede extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'igreja_id',
        'nome',
        'descricao',
        'ativa',
    ];

    protected function casts(): array
    {
        return [
            'ativa' => 'boolean',
        ];
    }

    public function igreja(): BelongsTo
    {
        return $this->belongsTo(Igreja::class);
    }

    public function supervisores(): BelongsToMany
    {
        return $this->belongsToMany(
            Membro::class,
            'rede_supervisores',
            'rede_id',
            'membro_id'
        )->withTimestamps();
    }

    public function celulas(): HasMany
    {
        return $this->hasMany(Celula::class);
    }
}