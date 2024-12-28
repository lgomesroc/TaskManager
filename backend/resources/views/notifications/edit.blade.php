<!-- resources/views/notifications/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Notificação</h1>
        <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $notification->title }}" required>
            </div>
            <div class="form-group">
                <label for="message">Mensagem</label>
                <textarea name="message" id="message" class="form-control" rows="5" required>{{ $notification->message }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Notificação</button>
        </form>
    </div>
@endsection
