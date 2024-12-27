<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\PasswordResetTokenController;
use App\Http\Controllers\PersonalAccessTokenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TarefaController;

Route::get('/', function () {
return view('welcome');  // Página inicial, pode ser modificada
});

Route::get('/tarefas', 'TarefaController@index')->name('tarefas.index');
Route::get('/tarefas/{id}', 'TarefaController@show')->name('tarefas.show');
Route::get('/tarefas/criar', 'TarefaController@create')->name('tarefas.create');
Route::post('/tarefas', 'TarefaController@store')->name('tarefas.store');
Route::get('/tarefas/{id}/editar', 'TarefaController@edit')->name('tarefas.edit');
Route::put('/tarefas/{id}', 'TarefaController@update')->name('tarefas.update');
Route::delete('/tarefas/{id}', 'TarefaController@destroy')->name('tarefas.destroy');

// Rotas para Usuários
Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Listar todos os usuários
Route::get('/users/criar', [UserController::class, 'create'])->name('users.criar'); // Formulário para criar um usuário
Route::post('/users', [UserController::class, 'store'])->name('users.salvar'); // Salvar novo usuário
Route::get('/users/{id}/editar', [UserController::class, 'edit'])->name('users.editar'); // Formulário para editar um usuário
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.atualizar'); // Atualizar usuário
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.deletar'); // Deletar usuário

// Rotas para Notificações
Route::get('/notificacoes', [NotificationController::class, 'index'])->name('notificacoes.index'); // Listar todas as notificações
Route::get('/notificacoes/criar', [NotificationController::class, 'create'])->name('notificacoes.criar'); // Formulário para criar uma notificação
Route::post('/notificacoes', [NotificationController::class, 'store'])->name('notificacoes.salvar'); // Salvar nova notificação
Route::get('/notificacoes/{id}/editar', [NotificationController::class, 'edit'])->name('notificacoes.editar'); // Formulário para editar uma notificação
Route::put('/notificacoes/{id}', [NotificationController::class, 'update'])->name('notificacoes.atualizar'); // Atualizar notificação
Route::delete('/notificacoes/{id}', [NotificationController::class, 'destroy'])->name('notificacoes.deletar'); // Deletar notificação

// Rotas para Anexos
Route::get('/anexos', [AttachmentController::class, 'index'])->name('anexos.index'); // Listar todos os anexos
Route::get('/anexos/criar', [AttachmentController::class, 'create'])->name('anexos.criar'); // Formulário para criar um anexo
Route::post('/anexos', [AttachmentController::class, 'store'])->name('anexos.salvar'); // Salvar novo anexo
Route::get('/anexos/{id}/editar', [AttachmentController::class, 'edit'])->name('anexos.editar'); // Formulário para editar um anexo
Route::put('/anexos/{id}', [AttachmentController::class, 'update'])->name('anexos.atualizar'); // Atualizar anexo
Route::delete('/anexos/{id}', [AttachmentController::class, 'destroy'])->name('anexos.deletar'); // Deletar anexo

// Rotas para Funções (Roles)
Route::get('/roles', [RoleController::class, 'index'])->name('funcoes.index'); // Listar todas as funções
Route::get('/roles/criar', [RoleController::class, 'create'])->name('funcoes.criar'); // Formulário para criar uma função
Route::post('/roles', [RoleController::class, 'store'])->name('funcoes.salvar'); // Salvar nova função
Route::get('/roles/{id}/editar', [RoleController::class, 'edit'])->name('funcoes.editar'); // Formulário para editar uma função
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('funcoes.atualizar'); // Atualizar função
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('funcoes.deletar'); // Deletar função

// Rotas para Associação de Usuários e Funções (Role_User)
Route::get('/role_user', [RoleUserController::class, 'index'])->name('role_usuario.index'); // Listar todas as associações
Route::post('/role_user', [RoleUserController::class, 'store'])->name('role_usuario.salvar'); // Criar nova associação
Route::delete('/role_user/{id}', [RoleUserController::class, 'destroy'])->name('role_usuario.deletar'); // Deletar associação

// Rotas para Tokens de Redefinição de Senha
Route::get('/password_reset_tokens', [PasswordResetTokenController::class, 'index'])->name('tokens_redefinicao_senha.index'); // Listar tokens
Route::post('/password_reset_tokens', [PasswordResetTokenController::class, 'store'])->name('tokens_redefinicao_senha.salvar'); // Criar token
Route::delete('/password_reset_tokens/{id}', [PasswordResetTokenController::class, 'destroy'])->name('tokens_redefinicao_senha.deletar'); // Deletar token

// Rotas para Tokens de Acesso Pessoal
Route::get('/perdonal_access_tokens', [PersonalAccessTokenController::class, 'index'])->name('tokens_acesso_pessoal.index'); // Listar tokens
Route::post('/perdonal_access_tokens', [PersonalAccessTokenController::class, 'store'])->name('tokens_acesso_pessoal.salvar'); // Criar token
Route::delete('/perdonal_access_tokens/{id}', [PersonalAccessTokenController::class, 'destroy'])->name('tokens_acesso_pessoal.deletar'); // Deletar token
