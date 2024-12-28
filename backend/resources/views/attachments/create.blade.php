<!-- resources/views/attachments/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Novo Anexo</h1>
        <form action="{{ route('attachments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nome do Anexo</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="file">Arquivo</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar Anexo</button>
        </form>
    </div>
@endsection
