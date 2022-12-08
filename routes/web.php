<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrashController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//GET
Route::get('/', function () { return view('welcome'); });
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/archive', [HomeController::class, 'archive'])->name('archive');
Route::get('/trash', [HomeController::class, 'trash'])->name('trash');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

//POST
Route::post('/add-note', [HomeController::class, 'addNote'])->name('add-note');
Route::get('/archive/{id}', [ArchiveController::class, 'moveToArchive'])->name('move-to-archive');
Route::get('/trash/{id}', [TrashController::class, 'moveToTrash'])->name('add-note');
