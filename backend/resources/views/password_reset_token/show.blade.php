<!-- resources/views/password_reset_token/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Token de Redefinição de Senha</h1>
        <p><strong>Email:</strong> {{ $token->email }}</p>
        <p><strong>Token:</strong> {{ $token->token }}</p>
        <p><strong>Expiração:</strong> {{ $token->expires_at }}</p>
        <a href="{{ route('password_reset_token.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
