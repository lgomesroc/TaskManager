<?php

// app/Http/Controllers/Api/TarefaController.php
namespace App\Http\Controllers\Api;

use App\Models\Tarefa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        return response()->json(Tarefa::all());
    }

    public function show($id)
    {
        return response()->json(Tarefa::findOrFail($id));
    }

    public function store(Request $request)
    {
        $tarefa = Tarefa::create($request->all());
        return response()->json($tarefa, 201);
    }

    public function update(Request $request, $id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($request->all());
        return response()->json($tarefa);
    }

    public function destroy($id)
    {
        Tarefa::destroy($id);
        return response()->json(null, 204);
    }
}
