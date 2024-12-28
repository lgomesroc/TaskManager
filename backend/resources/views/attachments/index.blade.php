<!-- resources/views/attachments/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Anexos</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attachments as $attachment)
                <tr>
                    <td>{{ $attachment->id }}</td>
                    <td>{{ $attachment->name }}</td>
                    <td>{{ $attachment->type }}</td>
                    <td>{{ $attachment->created_at }}</td>
                    <td>
                        <a href="{{ route('attachments.edit', $attachment->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('attachments.destroy', $attachment->id) }}" method="POST" style="display:inline;">
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
