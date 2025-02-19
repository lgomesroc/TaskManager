<!-- resources/views/password_reset_token/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Novo Token de Redefinição de Senha</h1>
        <form action="{{ route('password_reset_token.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="expires_at">Expiração</label>
                <input type="datetime-local" name="expires_at" id="expires_at" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar Token</button>
        </form>
    </div>
@endsection
