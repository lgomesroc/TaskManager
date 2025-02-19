<!-- resources/views/password_reset_token/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Token de Redefinição de Senha</h1>
        <form action="{{ route('password_reset_token.update', $token->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $token->email }}" required>
            </div>
            <div class="form-group">
                <label for="expires_at">Expiração</label>
                <input type="datetime-local" name="expires_at" id="expires_at" class="form-control" value="{{ $token->expires_at }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Token</button>
        </form>
    </div>
@endsection
