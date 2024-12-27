<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
public function index()
{
$users = User::all();
return view('users.index', compact('users'));  // Atualizado para 'users.index'
}

public function create()
{
// Show form to create a new user
}

public function store(Request $request)
{
// Save a new user
}

public function edit($id)
{
// Show form to edit a user
}

public function update(Request $request, $id)
{
// Update a user
}

public function destroy($id)
{
// Delete a user
}
}
