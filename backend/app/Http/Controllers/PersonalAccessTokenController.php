<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;
use Illuminate\Http\Request;

class PersonalAccessTokenController extends Controller
{
    // Exibir todos os tokens
    public function index()
    {
        $tokens = PersonalAccessToken::all();
        return view('personalAccessTokens.index', compact('tokens'));
    }

    // Criar um novo token
    public function create()
    {
        return view('personalAccessTokens.create');
    }

    // Armazenar um novo token
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        PersonalAccessToken::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'token' => bin2hex(random_bytes(16)), // Exemplo de geração de token
        ]);

        return redirect()->route('personalAccessTokens.index')->with('success', 'Token criado com sucesso!');
    }

    // Exibir um token específico
    public function show($id)
    {
        $token = PersonalAccessToken::findOrFail($id);
        return view('personalAccessTokens.show', compact('token'));
    }

    // Excluir um token
    public function destroy($id)
    {
        $token = PersonalAccessToken::findOrFail($id);
        $token->delete();

        return redirect()->route('personalAccessTokens.index')->with('success', 'Token excluído com sucesso!');
    }
}
