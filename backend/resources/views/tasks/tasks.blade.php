<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bem-vindo ao Gerenciamento de Tarefas</h1>
        <p>Esta página contém todas as funcionalidades relacionadas às tarefas.</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Ver Tarefas</a>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Criar Nova Tarefa</a>
    </div>
@endsection
