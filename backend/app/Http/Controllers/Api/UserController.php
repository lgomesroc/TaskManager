<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    // Adicione o uso da classe 'Controller' para que o método 'middleware' seja reconhecido
    public function __construct()
    {
        // Aplica a autenticação Sanctum para todas as rotas, exceto a criação de usuário
        $this->middleware('auth:sanctum')->except(['store']);
    }

    public function index()
    {
        try {
            $users = User::all();
            return response()->json([
                'status' => 'success',
                'data' => $users
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro ao listar usuários'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        Log::info('Store method called.');

        // Validação dos dados de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'sometimes|required|in:admin,usuario'
        ]);

        // Se a validação falhar, retorna os erros
        if ($validator->fails()) {
            Log::info('Validation failed.');
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        Log::info('Validation passed.');

        // Criação do novo usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'usuario'
        ]);

        Log::info('User created.');

        // Retorno do usuário criado
        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 201);
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não encontrado'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Validação dos dados de entrada para atualização
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|unique:users,email,' . $id,
                'password' => 'sometimes|required|string|min:8',
                'role' => 'sometimes|required|in:admin,usuario'
            ]);

            // Se a validação falhar, retorna os erros
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Dados a serem atualizados
            $dataToUpdate = $request->only(['name', 'email', 'role']);
            if ($request->filled('password')) {
                $dataToUpdate['password'] = bcrypt($request->password);
            }

            // Atualiza o usuário
            $user->update($dataToUpdate);

            // Retorno do usuário atualizado
            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro ao atualizar usuário: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Usuário deletado com sucesso'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro ao deletar usuário: ' . $e->getMessage()
            ], 500);
        }
    }
}
