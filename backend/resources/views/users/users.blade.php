@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bem-vindo à Página de Usuários</h1>
        <p>Escolha uma das opções abaixo para gerenciar os usuários:</p>
        <ul>
            <li><a href="{{ route('users.index') }}">Ver Todos os Usuários</a></li>
            <li><a href="{{ route('users.create') }}">Criar Novo Usuário</a></li>
        </ul>
    </div>
@endsection
