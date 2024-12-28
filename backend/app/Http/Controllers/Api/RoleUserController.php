<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleUserController extends Controller
{
    // Listar todos os usuários com seus papéis
    public function index()
    {
        $roleUsers = RoleUser::with('user', 'role')->get();
        return response()->json($roleUsers);
    }

    // Atribuir um papel a um usuário
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $roleUser = RoleUser::create($request->all());

        return response()->json($roleUser, 201);
    }

    // Exibir os papéis de um usuário
    public function show($id)
    {
        $roleUser = RoleUser::with('user', 'role')->where('user_id', $id)->get();

        if ($roleUser->isEmpty()) {
            return response()->json(['message' => 'Nenhum papel encontrado para o usuário'], 404);
        }

        return response()->json($roleUser);
    }

    // Deletar a associação de papel de um usuário
    public function destroy($id)
    {
        $roleUser = RoleUser::find($id);

        if (!$roleUser) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }

        $roleUser->delete();

        return response()->json(['message' => 'Associação de papel deletada com sucesso']);
    }
}
