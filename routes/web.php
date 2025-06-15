<?php

use App\Http\Controllers\FirebaseAuthController;
use App\Http\Controllers\FirebaseConnectionController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Kreait\Laravel\Firebase\Facades\Firebase;

Route::get('/', function () {
    return view('welcome');
});

// Route::get ('/', [FirebaseConnectionController::class, 'index']);
Route::get('/',[FirebaseAuthController::class, 'registerform']);
Route::post('/user-register',[FirebaseAuthController::class, 'register']);

Route::get('/form', [FirebaseAuthController::class, 'registerform']);

Route::get('/login', [FirebaseAuthController::class, 'loginForm'] );
Route::post('/user-login', [FirebaseAuthController::class, 'login'] );
Route::get('/dashboard', [FirebaseAuthController::class, 'dashboard'] );
use Illuminate\Support\Facades\Session;

Route::post('/logout', function () {
    Session::flush(); // Menghapus semua session
    return redirect('/login');
})->name('logout');

