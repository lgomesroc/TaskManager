<!DOCTYPE html>
<html>
<head>
    <title>Usuários</title>
</head>
<body>
<h1>Lista de Usuários</h1>
<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} - {{ $user->email }}</li>
    @endforeach
</ul>
</body>
</html>
