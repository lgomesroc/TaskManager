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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id(); // ID da tarefa
            $table->string('titulo'); // Título da tarefa
            $table->text('descricao')->nullable(); // Descrição da tarefa
            $table->enum('status', ['pendente', 'em andamento', 'concluida'])->default('pendente'); // Status
            $table->dateTime('data_limite')->nullable(); // Data limite
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com o usuário
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
};
