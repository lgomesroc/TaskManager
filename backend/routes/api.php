<?php
// routes/api.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\AttachmentController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RoleUserController;
use App\Http\Controllers\Api\PasswordResetTokenController;
use App\Http\Controllers\Api\PersonalAccessTokenController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tarefas', 'Api\TarefaController@index');  // Lista de tarefas
Route::get('/tarefas/{id}', 'Api\TarefaController@show');  // Detalhe de tarefa
Route::post('/tarefas', 'Api\TarefaController@store');  // Criar tarefa
Route::put('/tarefas/{id}', 'Api\TarefaController@update');  // Atualizar tarefa
Route::delete('/tarefas/{id}', 'Api\TarefaController@destroy');  // Deletar tarefa
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas para Users
Route::apiResource('users', UserController::class);

// Rotas para Notifications
Route::apiResource('notifications', NotificationController::class);

// Rotas para Attachments
Route::apiResource('attachments', AttachmentController::class);

// Rotas para Roles
Route::apiResource('roles', RoleController::class);

// Rotas para RoleUser
Route::apiResource('role-users', RoleUserController::class);

// Rotas para PasswordResetTokens
Route::apiResource('password-reset-tokens', PasswordResetTokenController::class);

// Rotas para PersonalAccessTokens
Route::apiResource('personal-access-tokens', PersonalAccessTokenController::class);
