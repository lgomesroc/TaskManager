<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Exibe a lista de usuários
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Exibe o formulário para criar um novo usuário
    public function create()
    {
        return view('users.create');
    }

    // Cria um novo usuário
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,usuario'
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password, // Não precisa do bcrypt aqui
                'role' => $request->role
            ]);

            return redirect()
                ->route('users.index')
                ->with('success', 'Usuário criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao criar usuário: ' . $e->getMessage());
        }
    }



    // Exibe um usuário específico
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Exibe o formulário para editar um usuário
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Atualiza um usuário existente
    public function update(Request $request, User $user)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Ignora o próprio email
            'password' => 'nullable|string|min:8|confirmed', // Senha opcional, se fornecida deve ser confirmada
        ]);

        // Atualiza os dados do usuário
        $data = $request->only(['name', 'email']); // Atualiza apenas nome e email por padrão
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); // Criptografa a senha, se fornecida
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Exclui um usuário
    public function destroy(User $user)
    {
        try {
            $user->delete(); // Remove o usuário do banco de dados
            return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Erro ao excluir o usuário: ' . $e->getMessage());
        }
    }
}
