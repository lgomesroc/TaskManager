<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\PasswordResetTokenController;
use App\Http\Controllers\PersonalAccessTokenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TarefaController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas para Tarefas
Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
Route::get('/tarefas/{id}', [TarefaController::class, 'show'])->name('tarefas.show');
Route::get('/tarefas/criar', [TarefaController::class, 'create'])->name('tarefas.create');
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
Route::get('/tarefas/{id}/editar', [TarefaController::class, 'edit'])->name('tarefas.edit');
Route::put('/tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

// Rotas para Usuários
Route::resource('users', UserController::class);

// Rotas para Notificações
Route::get('/notificacoes', [NotificationController::class, 'index'])->name('notificacoes.index');
Route::get('/notificacoes/criar', [NotificationController::class, 'create'])->name('notificacoes.create');
Route::post('/notificacoes', [NotificationController::class, 'store'])->name('notificacoes.store');
Route::get('/notificacoes/{id}/editar', [NotificationController::class, 'edit'])->name('notificacoes.edit');
Route::put('/notificacoes/{id}', [NotificationController::class, 'update'])->name('notificacoes.update');
Route::delete('/notificacoes/{id}', [NotificationController::class, 'destroy'])->name('notificacoes.destroy');

// Rotas para Anexos
Route::get('/anexos', [AttachmentController::class, 'index'])->name('anexos.index');
Route::get('/anexos/criar', [AttachmentController::class, 'create'])->name('anexos.create');
Route::post('/anexos', [AttachmentController::class, 'store'])->name('anexos.store');
Route::get('/anexos/{id}/editar', [AttachmentController::class, 'edit'])->name('anexos.edit');
Route::put('/anexos/{id}', [AttachmentController::class, 'update'])->name('anexos.update');
Route::delete('/anexos/{id}', [AttachmentController::class, 'destroy'])->name('anexos.destroy');

// Rotas para Funções (Roles)
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/criar', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{id}/editar', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

// Rotas para Associação de Usuários e Funções (Role_User)
Route::get('/role_user', [RoleUserController::class, 'index'])->name('role_user.index');
Route::post('/role_user', [RoleUserController::class, 'store'])->name('role_user.store');
Route::delete('/role_user/{id}', [RoleUserController::class, 'destroy'])->name('role_user.destroy');

// Rotas para Tokens de Redefinição de Senha
Route::get('/password_reset_tokens', [PasswordResetTokenController::class, 'index'])->name('password_reset_tokens.index');
Route::post('/password_reset_tokens', [PasswordResetTokenController::class, 'store'])->name('password_reset_tokens.store');
Route::delete('/password_reset_tokens/{id}', [PasswordResetTokenController::class, 'destroy'])->name('password_reset_tokens.destroy');

// Rotas para Tokens de Acesso Pessoal
Route::get('/personal_access_tokens', [PersonalAccessTokenController::class, 'index'])->name('personal_access_tokens.index');
Route::post('/personal_access_tokens', [PersonalAccessTokenController::class, 'store'])->name('personal_access_tokens.store');
Route::delete('/personal_access_tokens/{id}', [PersonalAccessTokenController::class, 'destroy'])->name('personal_access_tokens.destroy');

// Rotas de Autenticação
Route::get('/user/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/user/login', [AuthController::class, 'login']);
?>
