<!-- resources/views/roles.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gerenciamento de Roles</h1>
        <p>Esta página contém todas as funcionalidades relacionadas à criação e gerenciamento de roles.</p>
        <a href="{{ route('roles.index') }}" class="btn btn-primary">Ver Roles</a>
        <a href="{{ route('roles.create') }}" class="btn btn-success">Criar Novo Role</a>
    </div>
@endsection
