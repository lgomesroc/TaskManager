<!-- resources/views/personal_access_token/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Tokens de Acesso Pessoal</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Token</th>
                <th>Expiração</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($personalAccessTokens as $token)
                <tr>
                    <td>{{ $token->id }}</td>
                    <td>{{ $token->name }}</td>
                    <td>{{ $token->token }}</td>
                    <td>{{ $token->expires_at }}</td>
                    <td>
                        <a href="{{ route('personal_access_token.edit', $token->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('personal_access_token.destroy', $token->id) }}" method="POST" style="display:inline;">
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
