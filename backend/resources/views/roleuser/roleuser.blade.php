<!-- resources/views/roleuser.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gerenciamento de Roles e Usuários</h1>
        <p>Esta página contém todas as funcionalidades relacionadas à atribuição de roles para usuários.</p>
        <a href="{{ route('roleuser.index') }}" class="btn btn-primary">Ver Roles e Usuários</a>
        <a href="{{ route('roleuser.create') }}" class="btn btn-success">Atribuir Novo Role a Usuário</a>
    </div>
@endsection
