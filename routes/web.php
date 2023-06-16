<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::put('/tasks/{id}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.update-status');
Route::get('/completed-tasks', [TaskController::class, 'completedTasks'])->name('tasks.completed');
Route::get('/uncomplete-tasks', [TaskController::class, 'uncompleteTasks'])->name('tasks.uncomplete');




