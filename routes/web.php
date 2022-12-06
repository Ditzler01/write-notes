<?php

use App\Http\Controllers\HomeController;
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
