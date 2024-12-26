<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // List all users
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
