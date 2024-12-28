<!-- resources/views/personal_access_token.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gerenciamento de Tokens de Acesso Pessoal</h1>
        <p>Esta página contém todas as funcionalidades relacionadas à criação e gerenciamento de tokens de acesso pessoal.</p>
        <a href="{{ route('personal_access_token.index') }}" class="btn btn-primary">Ver Tokens</a>
        <a href="{{ route('personal_access_token.create') }}" class="btn btn-success">Criar Novo Token</a>
    </div>
@endsection
