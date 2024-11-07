<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/public', [MainController::class, 'public_index'])->name('public');
Route::get('/notes', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/note/{note}', [NoteController::class, 'show'])->name('note.show');
Route::get('/note/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/{note}', [NoteController::class, 'update'])->name('note.update');
Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.destroy');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('user.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('user.store');

Route::get('/login', [SessionController::class, 'create'])->name('session.login');
Route::post('/login', [SessionController::class, 'store'])->name('session.store');
Route::delete('/logout', [SessionController::class, 'destroy'])->name('session.destroy');
