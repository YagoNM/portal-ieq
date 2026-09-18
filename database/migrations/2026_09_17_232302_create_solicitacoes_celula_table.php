<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitacoes_celula', function (Blueprint $table) {
            $table->id();

            $table->foreignId('membro_id')
                ->constrained('membros')
                ->cascadeOnDelete();

            $table->foreignId('celula_origem_id')
                ->nullable()
                ->constrained('celulas')
                ->nullOnDelete();

            $table->foreignId('celula_destino_id')
                ->constrained('celulas')
                ->cascadeOnDelete();

            $table->string('status', 20)->default('pendente');

            $table->text('observacao')->nullable();

            $table->foreignId('analisado_por')
                ->nullable()
                ->constrained('membros')
                ->nullOnDelete();

            $table->timestamp('analisado_em')->nullable();

            $table->timestamps();

            $table->index(['celula_destino_id', 'status']);
            $table->index(['membro_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitacoes_celula');
    }
};