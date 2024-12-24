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
        Schema::create('anexos', function (Blueprint $table) {
            $table->id(); // ID do anexo
            $table->string('caminho'); // Caminho do arquivo
            $table->foreignId('tarefa_id')->constrained()->onDelete('cascade'); // Relacionamento com a tarefa
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('anexos');
    }
};
