<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membro_funcao', function (Blueprint $table) {
            $table->id();

            $table->foreignId('membro_id')
                ->constrained('membros')
                ->cascadeOnDelete();

            $table->foreignId('funcao_id')
                ->constrained('funcoes')
                ->cascadeOnDelete();

            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();

            $table->boolean('ativo')->default(true);

            $table->timestamps();

            $table->unique(
                ['membro_id', 'funcao_id'],
                'membro_funcao_unique'
            );

            $table->index(['funcao_id', 'ativo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membro_funcao');
    }
};