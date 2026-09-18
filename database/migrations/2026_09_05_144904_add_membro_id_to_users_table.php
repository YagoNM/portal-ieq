<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('membro_id')
                ->nullable()
                ->unique()
                ->after('id')
                ->constrained('membros')
                ->nullOnDelete();

            $table->boolean('ativo')
                ->default(true)
                ->after('password');

            $table->timestamp('ultimo_acesso_em')
                ->nullable()
                ->after('ativo');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['membro_id']);
            $table->dropUnique(['membro_id']);

            $table->dropColumn([
                'membro_id',
                'ativo',
                'ultimo_acesso_em',
            ]);
        });
    }
};