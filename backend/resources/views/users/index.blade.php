<!-- resources/views/users/index.blade.php -->
<h1>Lista de Usuários</h1>
<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
</ul>
