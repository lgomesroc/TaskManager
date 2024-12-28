<!-- resources/views/roleuser/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Roles e Usuários</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Usuário</th>
                <th>Role</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roleUsers as $roleUser)
                <tr>
                    <td>{{ $roleUser->id }}</td>
                    <td>{{ $roleUser->user->name }}</td>
                    <td>{{ $roleUser->role->name }}</td>
                    <td>
                        <a href="{{ route('roleuser.edit', $roleUser->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('roleuser.destroy', $roleUser->id) }}" method="POST" style="display:inline;">
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
