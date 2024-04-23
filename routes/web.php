<?php

use App\Http\Requests\TaskRequest;
use \App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::prefix('/tasks')->group(function () {

    Route::get('/', function () {
        return view('index')->with('tasks', Task::latest()->paginate());
    })->name('tasks.index');

    Route::view('/create', 'create')->name('tasks.create');

    Route::get('/{task}/edit', function (Task $task) {
        return view('edit')->with('task', $task);
    })->name('tasks.edit');

    Route::get('/{task}', function (Task $task) {
        return view('show')->with('task', $task);
    })->name('tasks.show');

    Route::post('/', function (TaskRequest $request) {
        $task = Task::create($request->validated());
        return redirect()->route('tasks.show', $task)
            ->with('success', 'Task created successfully!');
    })->name('tasks.store');

    Route::put('/{task}', function (TaskRequest $request, Task $task) {
        $task->update($request->validated());
        return redirect()->route('tasks.show', $task)
            ->with('success', 'Task updated successfully!');
    })->name('tasks.update');

    Route::delete('/{task}', function (Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    })->name('tasks.destroy');

    Route::patch('/{task}/toggle-complete', function (Task $task) {
        $message = $task->toggleComplete(); // defined in model
        return redirect()->back()
            ->with('success', $message);
    })->name('tasks.toggle-complete');
});
