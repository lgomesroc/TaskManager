<!-- resources/views/personal_access_token/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Novo Token de Acesso Pessoal</h1>
        <form action="{{ route('personal_access_token.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="expires_at">Expiração</label>
                <input type="datetime-local" name="expires_at" id="expires_at" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar Token</button>
        </form>
    </div>
@endsection
