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
        if (!Schema::hasTable('notificacoes')) {
            Schema::create('notificacoes', function (Blueprint $table) {
                $table->id(); // ID da notificação
                $table->string('titulo'); // Título da notificação
                $table->text('mensagem'); // Mensagem da notificação
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com o usuário
                $table->timestamps(); // created_at e updated_at
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('notificacoes');
    }
};
