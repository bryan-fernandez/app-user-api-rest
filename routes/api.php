<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('users', UserController::class, ['only' => ['index', 'store']]);
Route::post('login', [AuthController::class, 'login']);
Route::post('updatepasswordmail', [MailController::class, 'updatePassword']);