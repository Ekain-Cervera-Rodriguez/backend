<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TodoController;


Route::get('/todo', [TodoController::class,'index']);

Route::get('/todo/{id}', [TodoController::class,'show']);

Route::post('/todo', [TodoController::class,'store']);

Route::put('/todo/{id}', [TodoController::class,'update']);

Route::delete('/todo/{id}', [TodoController::class,'destroy']);


Route::resource('roles',RoleController::class, ['except' => ['create', 'edit']]);

Route::get('/roles/{id}', [RoleController::class,'show']);

Route::post('/roles', [RoleController::class,'store']);

Route::put('/roles/{id}', [RoleController::class,'update']);

Route::delete('/roles/{id}', [RoleController::class,'destroy']);
