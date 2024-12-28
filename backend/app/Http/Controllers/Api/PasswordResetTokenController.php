<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;

class PasswordResetTokenController extends Controller
{
    // Listar todos os tokens de reset de senha
    public function index()
    {
        $tokens = PasswordResetToken::all();
        return response()->json($tokens);
    }

    // Exibir um token de reset de senha específico
    public function show($id)
    {
        $token = PasswordResetToken::find($id);

        if (!$token) {
            return response()->json(['message' => 'Token não encontrado'], 404);
        }

        return response()->json($token);
    }

    // Deletar um token de reset de senha
    public function destroy($id)
    {
        $token = PasswordResetToken::find($id);

        if (!$token) {
            return response()->json(['message' => 'Token não encontrado'], 404);
        }

        $token->delete();

        return response()->json(['message' => 'Token de reset de senha deletado com sucesso']);
    }
}
