<!-- resources/views/personal_access_token/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Token de Acesso Pessoal</h1>
        <p><strong>Nome:</strong> {{ $token->name }}</p>
        <p><strong>Token:</strong> {{ $token->token }}</p>
        <p><strong>Expiração:</strong> {{ $token->expires_at }}</p>
        <a href="{{ route('personal_access_token.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
