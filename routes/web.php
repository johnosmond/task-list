<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = \App\Models\Task::latest()->get();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    $task = \App\Models\Task::findOrFail($id);
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request) {
    
    $data = $request->validate([
        'task' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new \App\Models\Task;
    $task->task = $data['task'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task created successfully!');

})->name('tasks.store');