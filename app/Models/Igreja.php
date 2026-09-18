<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Igreja extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'nome_fantasia',
        'cnpj',
        'telefone',
        'email',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'logo',
        'ativa',
    ];

    protected function casts(): array
    {
        return [
            'ativa' => 'boolean',
        ];
    }

    public function membros(): HasMany
    {
        return $this->hasMany(Membro::class);
    }

    public function redes(): HasMany
    {
        return $this->hasMany(Rede::class);
    }
}