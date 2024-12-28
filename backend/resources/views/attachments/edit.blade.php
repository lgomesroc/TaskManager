<!-- resources/views/attachments/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Anexo</h1>
        <form action="{{ route('attachments.update', $attachment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome do Anexo</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $attachment->name }}" required>
            </div>
            <div class="form-group">
                <label for="file">Novo Arquivo (opcional)</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Anexo</button>
        </form>
    </div>
@endsection
