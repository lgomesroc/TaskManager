<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    // Exibir os usuários de uma role específica
    public function index($roleId)
    {
        $role = Role::findOrFail($roleId);
        $users = $role->users;
        return view('roleUser.index', compact('role', 'users'));
    }

    // Atribuir uma role a um usuário
    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($userId);
        $user->roles()->attach($request->role_id);

        return redirect()->route('roleUser.index', ['roleId' => $request->role_id])
            ->with('success', 'Role atribuída com sucesso!');
    }

    // Remover uma role de um usuário
    public function removeRole(Request $request, $userId)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($userId);
        $user->roles()->detach($request->role_id);

        return redirect()->route('roleUser.index', ['roleId' => $request->role_id])
            ->with('success', 'Role removida com sucesso!');
    }
}
