<!-- resources/views/notifications/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Nova Notificação</h1>
        <form action="{{ route('notifications.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Mensagem</label>
                <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Criar Notificação</button>
        </form>
    </div>
@endsection
