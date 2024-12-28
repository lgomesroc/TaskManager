<!-- resources/views/tasks/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $task->title }}</h1>
        <p><strong>Descrição:</strong> {{ $task->description }}</p>
        <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
