<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('celulas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('rede_id')
                ->constrained('redes')
                ->restrictOnDelete();

            $table->string('nome');
            $table->text('descricao')->nullable();

            $table->string('dia_semana', 20)->nullable();
            $table->time('horario')->nullable();

            $table->string('cep', 9)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado', 2)->nullable();

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->boolean('ativo')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->unique(
                ['rede_id', 'nome'],
                'celulas_rede_nome_unique'
            );

            $table->index('rede_id', 'ativa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celulas');
    }
};
