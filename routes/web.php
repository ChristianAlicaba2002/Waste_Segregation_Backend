<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('Main');
    }
    return view('AdminSide.Auth.Login');
})->name('Login');

Route::middleware(['auth'])->group(function () {
    Route::get('/main', function () {
        return view('AdminSide.Pages.Main');
    })->name('Main');
    
});



Route::post('/Login', [AdminController::class, 'AdminLoginController'])->name('admin_login');
Route::post('/Logout', [AdminController::class, 'AdminLogoutController'])->name('admin_logout');