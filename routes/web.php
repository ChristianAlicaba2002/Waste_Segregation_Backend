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
        $message_support = DB::connection('mysql_waste_client')->table('message_support')->orderBy('created_at')->get();
        $trash_collected = DB::table('trash_collected')->get();
        $waste_item_collected = DB::table('waste_item')->get();
        $weightRecorded = DB::table('trash_collected')->sum('weightRecorded');

        $metal = $waste_item_collected->where('category_id', 1)->count();
        $paper = $waste_item_collected->where('category_id', 2)->count();
        $plastic = $waste_item_collected->where('category_id', 3)->count();
        
        return view('AdminSide.Pages.Main', compact('users','message_support','trash_collected','waste_item_collected','weightRecorded','metal','paper','plastic'));
    })->name('Main')->middleware(PreventBackHistory::class);
});


Route::post('/Login', [AdminController::class, 'AdminLoginController'])->name('admin_login');
Route::post('/Logout', [AdminController::class, 'AdminLogoutController'])->name('admin_logout');
