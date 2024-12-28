<!-- resources/views/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tarefa: {{ $task->title }}</h1>

        <p><strong>Descrição:</strong> {{ $task->description }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
        <p><strong>Criada em:</strong> {{ $task->created_at }}</p>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Voltar para a lista</a>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection
