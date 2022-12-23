<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::resource('portafolio', ProjectController::class)
    ->parameters(['portafolio' => 'project'])
    ->names('projects');

/* Route::get('/portafolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portafolio/crear', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/portafolio/{project}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/portafolio/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::post('/portafolio', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/portafolio/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::delete('/portafolio/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy'); */



Route::view('/contact', 'contact')->name('contact');

Route::post('contact', [MessageController::class, 'store'])->name('messages.store');
Auth::routes(['register' => true]);