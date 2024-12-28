<!-- resources/views/notifications/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Notificações</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Mensagem</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->title }}</td>
                    <td>{{ $notification->message }}</td>
                    <td>{{ $notification->created_at }}</td>
                    <td>
                        <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
