<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    // Listar todos os papéis
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    // Criar um novo papel
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $role = Role::create($request->all());

        return response()->json($role, 201);
    }

    // Exibir um único papel
    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Papel não encontrado'], 404);
        }

        return response()->json($role);
    }

    // Atualizar um papel
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Papel não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nome' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $role->update($request->only('nome'));

        return response()->json($role);
    }

    // Deletar um papel
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Papel não encontrado'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'Papel deletado com sucesso']);
    }
}
