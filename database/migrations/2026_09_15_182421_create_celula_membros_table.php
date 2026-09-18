<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('celula_membros', function (Blueprint $table) {
            $table->id();

            $table->foreignId('celula_id')
                ->constrained('celulas')
                ->cascadeOnDelete();

            $table->foreignId('membro_id')
                ->constrained('membros')
                ->cascadeOnDelete();

            $table->string('funcao', 20)
                ->default('membro');

            $table->date('data_entrada')->nullable();

            $table->timestamps();

            $table->unique(
                'membro_id',
                'celula_membros_membro_unique'
            );

            $table->index([
                'celula_id',
                'funcao',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('celula_membros');
    }
};