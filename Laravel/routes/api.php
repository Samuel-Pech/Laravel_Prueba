<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'login']);
Route::get('/index', [Usuario::class, 'index']);
Route::post('/create', [Usuario::class, 'create']);
Route::put('/update/{id}', [Usuario::class, 'update']);
Route::delete('/delete/{id}', [Usuario::class, 'delete']);
