<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Tarefa</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" class="form-control" rows="3" required>{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pendente</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>Em andamento</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Concluída</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
