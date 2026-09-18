<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rede_supervisores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('rede_id')
                ->constrained('redes')
                ->cascadeOnDelete();

            $table->foreignId('membro_id')
                ->constrained('membros')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique('membro_id');

            $table->unique(
                ['rede_id', 'membro_id'],
                'rede_supervisor_unique'
            );

            $table->index('rede_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rede_supervisores');
    }
};
