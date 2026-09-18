<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();

            $table->foreignId('igreja_id')
                ->constrained('igrejas')
                ->restrictOnDelete();

            $table->string('nome');
            $table->date('data_nascimento')->nullable();

            $table->string('sexo', 20)->nullable();

            $table->string('telefone', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('cpf', 14)->nullable();

            $table->string('cep', 9)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado', 2)->nullable();

            $table->date('data_entrada')->nullable();

            $table->string('status', 20)->default('ativo');

            $table->text('observacoes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('nome');
            $table->index('status');
            $table->index(['igreja_id', 'status']);

            $table->unique(
                ['igreja_id', 'cpf'],
                'membros_igreja_cpf_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membros');
    }
};