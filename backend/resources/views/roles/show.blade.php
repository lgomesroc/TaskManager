<!-- resources/views/roles/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Role</h1>
        <p><strong>Nome:</strong> {{ $role->name }}</p>
        <p><strong>Descrição:</strong> {{ $role->description }}</p>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
