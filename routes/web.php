<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Posts;

/* MyAcad */
Route::get('/', [Posts::class, 'render'])->middleware(['auth','verified']);
//Route::get('/', [PostController::class, 'index'])->middleware(['auth','verified']);
Route::get('/categoria/{category?}', [Posts::class, 'category'])->middleware(['auth','verified']);
//Route::get('/categoria/{category?}', [PostController::class, 'category'])->middleware(['auth','verified']);
Route::get('/posts/criar', [PostController::class, 'create'])->middleware(['auth','verified']);
Route::post('/posts/store', [PostController::class, 'store'])->middleware(['auth','verified']);
Route::get('/posts/{id}', [Posts::class, 'show'])->middleware(['auth','verified']);
//Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth','verified']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->middleware(['auth','verified']);
Route::put('/posts/update/{id}', [PostController::class, 'update'])->middleware(['auth','verified']);
Route::put('/posts/enable/{id}', [PostController::class, 'enable'])->middleware(['auth','verified']);
Route::put('/posts/disable/{id}', [PostController::class, 'disable'])->middleware(['auth','verified']);
Route::get('/perfil/my-posts', [PostController::class, 'myPosts'])->middleware(['auth','verified']);
Route::get('/perfil/edit', [PostController::class, 'profileEdit'])->middleware(['auth','verified']);
Route::put('/perfil/update', [PostController::class, 'profileUpdate'])->middleware(['auth','verified']);
Route::get('/perfil/{id}', [PostController::class, 'profile'])->middleware(['auth','verified']);
Route::get('/notificacoes', [PostController::class, 'notifications'])->middleware(['auth','verified']);
Route::get('/regras', [PostController::class, 'rules'])->middleware(['auth','verified']);


/* Calouros */
Route::get('/calouros', [PostController::class, 'welcome'])->middleware('auth');
Route::get('/calouros/sobre', [PostController::class, 'about'])->middleware('auth');
Route::get('/calouros/republicas', [PostController::class, 'republics'])->middleware('auth');
Route::get('/calouros/depoimentos', [PostController::class, 'veterans'])->middleware('auth');
Route::get('/calouros/grupos', [PostController::class, 'groups'])->middleware('auth');


