// routes/web.php
use Illuminate\Support\Facades\Route;

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
