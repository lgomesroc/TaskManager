<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID do usuário
            $table->string('name'); // Nome do usuário
            $table->string('email')->unique(); // E-mail do usuário
            $table->timestamp('email_verified_at')->nullable(); // Verificação de e-mail
            $table->string('password'); // Senha
            $table->enum('role', ['admin', 'usuario'])->default('usuario'); // Papel do usuário (admin ou usuário)
            $table->rememberToken(); // Token de lembrança (para login persistente)
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
