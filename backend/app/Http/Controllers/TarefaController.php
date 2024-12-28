<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    // Exibe a lista de tarefas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Exibe o formulário para criar uma nova tarefa
    public function create()
    {
        return view('tasks.create');
    }

    // Cria uma nova tarefa
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    // Exibe uma tarefa específica
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Exibe o formulário para editar uma tarefa
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Atualiza uma tarefa
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    // Exclui uma tarefa
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
