<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\AttachmentController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RoleUserController;
use App\Http\Controllers\Api\PasswordResetTokenController;
use App\Http\Controllers\Api\PersonalAccessTokenController;
use App\Http\Controllers\Api\TarefaController;

// Rota do usuário autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Grupo de rotas protegidas por autenticação
Route::middleware('auth:sanctum')->group(function () {
    // Rotas de Tarefas
    Route::apiResource('tarefas', TarefaController::class);

    // Outras rotas protegidas
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('attachments', AttachmentController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('role-users', RoleUserController::class);
    Route::apiResource('password-reset-tokens', PasswordResetTokenController::class);
    Route::apiResource('personal-access-tokens', PersonalAccessTokenController::class);
});

// Rotas de usuários (algumas endpoints são públicos, outros protegidos no controller)
Route::apiResource('users', UserController::class);
