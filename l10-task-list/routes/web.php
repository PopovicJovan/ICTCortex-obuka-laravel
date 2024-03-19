<?php

use Illuminate\Http\Response;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function (){
    $tasks = Task::latest()->paginate(10);
    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task){
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task){
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request){
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task is created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request){
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task is updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task){
    $task->delete();
    return redirect()->route('tasks.index')
        ->with('success', 'Task is deleted successfully!');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-completed', function (Task $task){
    $task->toggleCompleted();
    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');




