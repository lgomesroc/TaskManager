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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id(); // ID primário
            $table->string('file_name'); // Nome do arquivo
            $table->string('file_path'); // Caminho do arquivo
            $table->string('mime_type'); // Tipo MIME
            $table->unsignedBigInteger('user_id'); // Relacionamento com o usuário
            $table->timestamps(); // Campos de created_at e updated_at

            // Chave estrangeira
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anexos');
    }
};
