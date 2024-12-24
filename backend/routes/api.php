<?php
// routes/api.php
use Illuminate\Support\Facades\Route;

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
