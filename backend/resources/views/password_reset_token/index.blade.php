<!-- resources/views/password_reset_token/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Tokens de Redefinição de Senha</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Token</th>
                <th>Expiração</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($passwordResetTokens as $token)
                <tr>
                    <td>{{ $token->id }}</td>
                    <td>{{ $token->email }}</td>
                    <td>{{ $token->token }}</td>
                    <td>{{ $token->expires_at }}</td>
                    <td>
                        <a href="{{ route('password_reset_token.edit', $token->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('password_reset_token.destroy', $token->id) }}" method="POST" style="display:inline;">
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
