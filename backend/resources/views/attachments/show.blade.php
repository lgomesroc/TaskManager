<!-- resources/views/attachments/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Anexo</h1>
        <p><strong>Nome:</strong> {{ $attachment->name }}</p>
        <p><strong>Tipo:</strong> {{ $attachment->type }}</p>
        <p><strong>Data de Criação:</strong> {{ $attachment->created_at }}</p>
        <p><strong>Arquivo:</strong> <a href="{{ route('attachments.download', $attachment->id) }}">Baixar</a></p>
        <a href="{{ route('attachments.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
