<!-- resources/views/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Tarefa</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" required>{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pendente" {{ $task->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="em andamento" {{ $task->status == 'em andamento' ? 'selected' : '' }}>Em andamento</option>
                    <option value="concluída" {{ $task->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar Tarefa</button>
        </form>
    </div>
@endsection
