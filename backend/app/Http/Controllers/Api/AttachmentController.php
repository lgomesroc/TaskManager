<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttachmentController extends Controller
{
    // Listar todos os anexos
    public function index()
    {
        $attachments = Attachment::all();
        return response()->json($attachments);
    }

    // Criar um novo anexo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:10240', // Limite de 10MB
            'task_id' => 'required|exists:tasks,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $filePath = $request->file('file')->store('attachments');

        $attachment = Attachment::create([
            'file_path' => $filePath,
            'task_id' => $request->task_id,
        ]);

        return response()->json($attachment, 201);
    }

    // Exibir um único anexo
    public function show($id)
    {
        $attachment = Attachment::find($id);

        if (!$attachment) {
            return response()->json(['message' => 'Anexo não encontrado'], 404);
        }

        return response()->json($attachment);
    }

    // Deletar um anexo
    public function destroy($id)
    {
        $attachment = Attachment::find($id);

        if (!$attachment) {
            return response()->json(['message' => 'Anexo não encontrado'], 404);
        }

        // Excluir o arquivo fisicamente
        unlink(storage_path('app/' . $attachment->file_path));

        $attachment->delete();

        return response()->json(['message' => 'Anexo deletado com sucesso']);
    }
}
