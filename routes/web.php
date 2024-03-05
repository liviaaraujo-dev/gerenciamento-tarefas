<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('auth');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
