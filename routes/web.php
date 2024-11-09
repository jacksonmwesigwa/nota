<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/public', [MainController::class, 'public_index'])->name('public');
Route::get('/notes', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create')->middleware('auth');
Route::post('/note', [NoteController::class, 'store'])->name('note.store')->middleware('auth');
Route::get('/note/{note}', [NoteController::class, 'show'])->name('note.show');
Route::get('/note/{note}/edit', [NoteController::class, 'edit'])->name('note.edit')->middleware('auth');
Route::put('/note/{note}', [NoteController::class, 'update'])->name('note.update')->middleware('auth');
Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.destroy')->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('user.create')->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('user.store')->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('session.store')->middleware('guest');
Route::delete('/logout', [SessionController::class, 'destroy'])->name('session.destroy')->middleware('auth');
