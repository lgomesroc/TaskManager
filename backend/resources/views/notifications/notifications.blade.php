<!-- resources/views/notifications.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gerenciamento de Notificações</h1>
        <p>Esta página contém todas as funcionalidades relacionadas à criação e gerenciamento de notificações.</p>
        <a href="{{ route('notifications.index') }}" class="btn btn-primary">Ver Notificações</a>
        <a href="{{ route('notifications.create') }}" class="btn btn-success">Criar Nova Notificação</a>
    </div>
@endsection
