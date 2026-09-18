<?php

namespace App\Enums;

enum StatusSolicitacaoCelula: string
{
    case PENDENTE = 'pendente';
    case APROVADA = 'aprovada';
    case REJEITADA = 'rejeitada';
    case CANCELADA = 'cancelada';
}