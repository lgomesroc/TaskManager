<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Usuário</title>
</head>
<body>
<h1>Criar Novo Usuário</h1>

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="submit">Criar Usuário</button>
    </div>
</form>

<br>
<a href="{{ route('usuarios.index') }}">Voltar para a lista de usuários</a>
</body>
</html>
