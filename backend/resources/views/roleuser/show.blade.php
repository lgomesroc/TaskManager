<!-- resources/views/roleuser/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Atribuição de Role a Usuário</h1>
        <p><strong>Usuário:</strong> {{ $roleUser->user->name }}</p>
        <p><strong>Role:</strong> {{ $roleUser->role->name }}</p>
        <a href="{{ route('roleuser.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
