<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
        
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'boolean',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'boolean',
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function show(Task $task)
    {   
    return view('tasks.show', compact('task'));
    }

    public function updateStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $status = $request->input('status');

        if ($status === 'Selesai') {
            $task->status = true;
        } elseif ($status === 'Belum Selesai') {
            $task->status = false;
        } else {
            return redirect()->back()->with('error', 'Invalid status value.');
        }

        $task->save();

        return redirect()->back()->with('success', 'Task status updated successfully.');
    }

    public function completedTasks()
    {
    $completedTasks = Task::where('status', true)->get();

    return view('tasks.complete', compact('completedTasks'));
    }

    public function uncompleteTasks()
    {
        $uncompleteTasks = Task::where('status', false)->get();

        return view('tasks.uncomplete', compact('uncompleteTasks'));
    }

}
