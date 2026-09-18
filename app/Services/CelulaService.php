<?php

namespace App\Services;

use App\Enums\FuncaoCelula;
use App\Models\Celula;
use App\Models\Membro;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Enums\StatusSolicitacaoCelula;
use App\Models\SolicitacaoCelula;

class CelulaService
{
    public function adicionarMembro(
        Celula $celula,
        Membro $membro,
        FuncaoCelula $funcao = FuncaoCelula::MEMBRO
    ): void {
        // A pessoa e a célula precisam pertencer à mesma igreja.
        if ($membro->igreja_id !== $celula->rede->igreja_id) {
            throw ValidationException::withMessages([
                'membro' => 'O membro e a célula pertencem a igrejas diferentes.',
            ]);
        }

        // Um membro pode pertencer a apenas uma célula.
        if ($membro->celulas()->exists()) {
            throw ValidationException::withMessages([
                'membro' => 'Este membro já pertence a uma célula.',
            ]);
        }

        $celula->membros()->attach($membro->id, [
            'funcao' => $funcao->value,
            'data_entrada' => now()->toDateString(),
        ]);
    }

    public function alterarFuncao(
        Celula $celula,
        Membro $membro,
        FuncaoCelula $novaFuncao
    ): void {
        $vinculo = $celula->membros()
            ->where('membros.id', $membro->id)
            ->first();

        if (! $vinculo) {
            throw ValidationException::withMessages([
                'membro' => 'Este membro não pertence a esta célula.',
            ]);
        }

        $celula->membros()->updateExistingPivot(
            $membro->id,
            [
                'funcao' => $novaFuncao->value,
            ]
        );
    }

    public function transferirMembro(
        Membro $membro,
        Celula $celulaDestino,
        FuncaoCelula $funcao = FuncaoCelula::MEMBRO
    ): void {
        $celulaAtual = $membro->celulas()->first();

        if (! $celulaAtual) {
            throw ValidationException::withMessages([
                'membro' => 'Este membro não pertence a nenhuma célula.',
            ]);
        }

        if ($celulaAtual->id === $celulaDestino->id) {
            throw ValidationException::withMessages([
                'celula' => 'O membro já pertence a esta célula.',
            ]);
        }

        if ($membro->igreja_id !== $celulaDestino->rede->igreja_id) {
            throw ValidationException::withMessages([
                'membro' => 'O membro e a célula de destino pertencem a igrejas diferentes.',
            ]);
        }

        DB::transaction(function () use (
            $membro,
            $celulaAtual,
            $celulaDestino,
            $funcao
        ) {
            $celulaAtual->membros()->detach($membro->id);

            $celulaDestino->membros()->attach($membro->id, [
                'funcao' => $funcao->value,
                'data_entrada' => now()->toDateString(),
            ]);
        });
    }

    public function solicitarEntrada(
        Membro $membro,
        Celula $celulaDestino,
        ?string $observacao = null
    ): SolicitacaoCelula {
        $celulaAtual = $membro->celulas()->first();

        if ($membro->igreja_id !== $celulaDestino->rede->igreja_id) {
            throw ValidationException::withMessages([
                'celula' => 'O membro e a célula de destino pertencem a igrejas diferentes.',
            ]);
        }

        if ($celulaAtual && $celulaAtual->id === $celulaDestino->id) {
            throw ValidationException::withMessages([
                'celula' => 'O membro já pertence a esta célula.',
            ]);
        }

        $solicitacaoPendente = SolicitacaoCelula::query()
            ->where('membro_id', $membro->id)
            ->where('celula_destino_id', $celulaDestino->id)
            ->where('status', StatusSolicitacaoCelula::PENDENTE->value)
            ->exists();

        if ($solicitacaoPendente) {
            throw ValidationException::withMessages([
                'solicitacao' => 'Já existe uma solicitação pendente para esta célula.',
            ]);
        }

        return SolicitacaoCelula::create([
            'membro_id' => $membro->id,
            'celula_origem_id' => $celulaAtual?->id,
            'celula_destino_id' => $celulaDestino->id,
            'status' => StatusSolicitacaoCelula::PENDENTE,
            'observacao' => $observacao,
        ]);
    }

    public function aprovarSolicitacao(
        SolicitacaoCelula $solicitacao,
        Membro $analisador
    ): void {
        if ($solicitacao->status !== StatusSolicitacaoCelula::PENDENTE) {
            throw ValidationException::withMessages([
                'solicitacao' => 'Esta solicitação já foi analisada.',
            ]);
        }

        $this->validarAnalisador($solicitacao, $analisador);

        DB::transaction(function () use ($solicitacao, $analisador) {
            $membro = $solicitacao->membro;
            $celulaDestino = $solicitacao->celulaDestino;
            $celulaAtual = $membro->celulas()->first();

            if ($celulaAtual) {
                $celulaAtual->membros()->detach($membro->id);
            }

            $celulaDestino->membros()->attach($membro->id, [
                'funcao' => FuncaoCelula::MEMBRO->value,
                'data_entrada' => now()->toDateString(),
            ]);

            $solicitacao->update([
                'status' => StatusSolicitacaoCelula::APROVADA,
                'analisado_por' => $analisador->id,
                'analisado_em' => now(),
            ]);
        });
    }

    public function rejeitarSolicitacao(
        SolicitacaoCelula $solicitacao,
        Membro $analisador
    ): void {
        if ($solicitacao->status !== StatusSolicitacaoCelula::PENDENTE) {
            throw ValidationException::withMessages([
                'solicitacao' => 'Esta solicitação já foi analisada.',
            ]);
        }

        $this->validarAnalisador($solicitacao, $analisador);

        $solicitacao->update([
            'status' => StatusSolicitacaoCelula::REJEITADA,
            'analisado_por' => $analisador->id,
            'analisado_em' => now(),
        ]);
    }

    private function validarAnalisador(
        SolicitacaoCelula $solicitacao,
        Membro $analisador
    ): void {
        $ehLiderDaCelula = $solicitacao->celulaDestino
            ->membros()
            ->where('membros.id', $analisador->id)
            ->wherePivot('funcao', FuncaoCelula::LIDER->value)
            ->exists();

        if (! $ehLiderDaCelula) {
            throw ValidationException::withMessages([
                'analisador' => 'Este membro não tem permissão para analisar solicitações desta célula.',
            ]);
        }
    }


}