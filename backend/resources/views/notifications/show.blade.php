<!-- resources/views/notifications/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Notificação</h1>
        <p><strong>Título:</strong> {{ $notification->title }}</p>
        <p><strong>Mensagem:</strong> {{ $notification->message }}</p>
        <p><strong>Data:</strong> {{ $notification->created_at }}</p>
        <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
