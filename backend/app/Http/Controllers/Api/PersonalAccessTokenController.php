<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;
use Illuminate\Http\Request;

class PersonalAccessTokenController extends Controller
{
    // Listar todos os tokens de acesso pessoal
    public function index()
    {
        $tokens = PersonalAccessToken::all();
        return response()->json($tokens);
    }

    // Exibir um token de acesso pessoal específico
    public function show($id)
    {
        $token = PersonalAccessToken::find($id);

        if (!$token) {
            return response()->json(['message' => 'Token não encontrado'], 404);
        }

        return response()->json($token);
    }

    // Deletar um token de acesso pessoal
    public function destroy($id)
    {
        $token = PersonalAccessToken::find($id);

        if (!$token) {
            return response()->json(['message' => 'Token não encontrado'], 404);
        }

        $token->delete();

        return response()->json(['message' => 'Token de acesso pessoal deletado com sucesso']);
    }
}
