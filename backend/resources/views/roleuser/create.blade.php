<!-- resources/views/roleuser/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Atribuir Role a Usuário</h1>
        <form action="{{ route('roleuser.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Usuário</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" id="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atribuir Role</button>
        </form>
    </div>
@endsection
