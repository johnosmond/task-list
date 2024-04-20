<?php

use \App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::prefix('/tasks')->group(function () {

    Route::get('/', function () {
        return view('index', [
            'tasks' => Task::latest()->get()
        ]);
    })->name('/tasks.index');

    Route::view('/create', 'create')->name('tasks.create');

    Route::get('/{id}', function ($id) {
        return view('show', [
            'task' => Task::findOrFail($id)
        ]);
    })->name('tasks.show');

    Route::post('/', function (Request $request) {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
            'due_date' => [
                'nullable', 'date',
                function($attribute, $value, $fail) {
                    if (strtotime($value) < strtotime('today')) {
                        $fail('Due Date must be a date of today or after.');
                    }
                }],
        ]);
        $task = Task::create($data);
        $task->save();
        return redirect()->route('tasks.show', $task->id)
            ->with('success', 'Task created successfully!');
    })->name('tasks.store');

});
