<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;
use Illuminate\Http\Request;

class PasswordResetTokenController extends Controller
{
    // Exibe a lista de tokens de acesso pessoal
    public function index()
    {
        $tokens = PersonalAccessToken::all();
        return view('personal_access_tokens.index', compact('tokens'));
    }

    // Exibe um token de acesso pessoal específico
    public function show(PersonalAccessToken $token)
    {
        return view('personal_access_tokens.show', compact('token'));
    }

    // Exclui um token de acesso pessoal
    public function destroy(PersonalAccessToken $token)
    {
        $token->delete();
        return redirect()->route('personal_access_tokens.index');
    }
}
