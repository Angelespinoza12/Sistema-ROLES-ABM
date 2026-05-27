<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [AuthController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [UsuarioController::class, 'index']);

    Route::post('/usuarios', [UsuarioController::class, 'store']);

    Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit']);

    Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);

    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

    Route::get('/perfil', [UsuarioController::class, 'perfil']);

    Route::get('/logout', [AuthController::class, 'logout']);

});