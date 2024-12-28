<!-- resources/views/roles/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Novo Role</h1>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome do Role</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Criar Role</button>
        </form>
    </div>
@endsection
