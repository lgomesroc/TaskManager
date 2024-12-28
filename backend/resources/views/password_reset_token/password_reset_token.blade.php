<!-- resources/views/password_reset_token.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gerenciamento de Tokens de Redefinição de Senha</h1>
        <p>Esta página contém todas as funcionalidades relacionadas à criação e gerenciamento de tokens de redefinição de senha.</p>
        <a href="{{ route('password_reset_token.index') }}" class="btn btn-primary">Ver Tokens</a>
        <a href="{{ route('password_reset_token.create') }}" class="btn btn-success">Criar Novo Token</a>
    </div>
@endsection
