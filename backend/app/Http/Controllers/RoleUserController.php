<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetTokenController extends Controller
{
    public function index()
    {
        // List all password reset tokens
    }

    public function store(Request $request)
    {
        // Save a new password reset token
    }

    public function destroy($id)
    {
        // Delete a password reset token
    }
}
