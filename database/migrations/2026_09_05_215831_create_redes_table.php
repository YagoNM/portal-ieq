<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('redes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('igreja_id')
                ->constrained('igrejas')
                ->restrictOnDelete();

            $table->string('nome');
            $table->text('descricao')->nullable();

            $table->boolean('ativa')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->unique(
                ['igreja_id', 'nome'],
                'redes_igreja_nome_unique'
            );

            $table->index(['igreja_id', 'ativa']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redes');
    }
};