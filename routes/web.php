<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('Main');
    }
    return view('AdminSide.Auth.Login');
})->name('Login')->middleware(PreventBackHistory::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/main', function () {
        $users = DB::connection('mysql_waste_client')->table('clients')->orderBy('created_at' , 'desc')->get();
        $noneUser = DB::connection('mysql_waste_client')->table('none_user')->orderBy('created_at')->get();
        return view('AdminSide.Pages.Main', compact('users','noneUser'));
    })->name('Main')->middleware(PreventBackHistory::class);
});


Route::post('/Login', [AdminController::class, 'AdminLoginController'])->name('admin_login');
Route::post('/Logout', [AdminController::class, 'AdminLogoutController'])->name('admin_logout');
