<!-- resources/views/attachments.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gerenciamento de Anexos</h1>
        <p>Esta página contém todas as funcionalidades relacionadas à criação e gerenciamento de anexos.</p>
        <a href="{{ route('attachments.index') }}" class="btn btn-primary">Ver Anexos</a>
        <a href="{{ route('attachments.create') }}" class="btn btn-success">Criar Novo Anexo</a>
    </div>
@endsection
