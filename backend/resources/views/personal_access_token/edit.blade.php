<!-- resources/views/personal_access_token/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Token de Acesso Pessoal</h1>
        <form action="{{ route('personal_access_token.update', $token->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $token->name }}" required>
            </div>
            <div class="form-group">
                <label for="expires_at">Expiração</label>
                <input type="datetime-local" name="expires_at" id="expires_at" class="form-control" value="{{ $token->expires_at }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Token</button>
        </form>
    </div>
@endsection
