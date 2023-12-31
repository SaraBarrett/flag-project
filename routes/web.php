<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'welcome'] )->name('welcome');


//rota home, retorna a página inicial da nossa app
Route::get('/home', [IndexController::class, 'home'])->name('index');

//users
Route::get('/add-user', [UserController::class, 'addUser'])->name('users.add');
Route::post('/create-user',  [UserController::class, 'createUser'])->name('users.create');

Route::post('/edit-user',  [UserController::class, 'updateUser'])->name('users.update');

Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('users.view');
Route::get('/all-users', [UserController::class, 'allUsers'])->name('users.all');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');


//tasks
Route::get('/all-tasks', [TaskController::class, 'allTasks'])->name('tasks.all');

Route::get('/add-task', [TaskController::class, 'addTask'])->name('tasks.add')->middleware('auth');


Route::post('/create-task',  [TaskController::class, 'createTask'])->name('tasks.create');

Route::get('/view-task/{id}/', [TaskController::class, 'viewTask'])->name('tasks.view');
Route::get('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

//rota teste, retorna uma tag <h1>Hello World</h1>
Route::get('/hello', [IndexController::class, 'hello']);

Route::get('/turma/{nome}', [IndexController::class, 'helloName']);


//rota fallback, quando chamamos por uma rota não registada
Route::fallback(function(){
    return view('home.fallback');
});
