<?php

namespace App\Models;

use App\Enums\FuncaoCelula;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CelulaMembro extends Pivot
{
    protected $table = 'celula_membros';

    protected function casts(): array
    {
        return [
            'funcao' => FuncaoCelula::class,
            'data_entrada' => 'date',
        ];
    }
}