<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $user = User::with('tasks')->find($userId);
        $tasks = $user->tasks;


        return view('home', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_title' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);

        $task = new Task([
            'title' => $request->input('task_title'),
            'category_id' => $request->input('category_id')
        ]);

        $request->user()->categories()->save($task);

        return back()->with('success', 'Tarefa criada com sucesso!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'task_title' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);

        $completed = $request->input('completed');

        Task::findOrFail($id)->update([
            'title' => $request->task_title,
            'category_id' => $request->category_id,
            'completed' => $completed
        ]);

        return back()->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function completedTask(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
        ]);

        Task::findOrFail($id)->update([
            'title' => $request->task_title,
            'category_id' => $request->category_id
        ]);

        return back()->with('success', 'Tarefa atualizada com sucesso!');
    }


    public function destroy(Task $task)
    {
        if (auth()->user()->id !== $task->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->delete();

        return back()->with('success', 'Categoria excluída com sucesso!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('updatetask', compact('task'));
    }
}