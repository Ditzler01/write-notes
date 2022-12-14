<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//GET
Route::get('/', function () { return view('welcome'); });
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/archive', [ArchiveController::class, 'archive'])->name('archive');
Route::get('/trash', [TrashController::class, 'trash'])->name('trash');
Route::get('/archive/{id}', [ArchiveController::class, 'moveToArchive'])->name('move-to-archive');
Route::get('archive/restore/{id}', [ArchiveController::class, 'restore'])->name('restore-archive');
Route::get('archive/trash/{id}', [ArchiveController::class, 'moveToTrash'])->name('trash-archive');
Route::get('/trash/{id}', [TrashController::class, 'moveToTrash'])->name('add-note');
Route::get('/trash/restore/{id}', [TrashController::class, 'restore'])->name('add-note');
Route::get('/trash/delete/{id}', [TrashController::class, 'delete'])->name('add-note');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

//POST
Route::post('/add-note', [HomeController::class, 'addNote'])->name('add-note');
Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
Route::post('/update-note/{id}', [HomeController::class, 'updateNote'])->name('update-note');
