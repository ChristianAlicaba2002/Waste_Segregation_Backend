<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function AdminLoginController(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            Auth::user();
            return redirect('/main');
        }

        return redirect('/')->with('error',"Couldn't find your Admin Account");
    }

    function AdminLogoutController(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('Login');
    }

    function AdminDashboardController()
    {
        DB::table('users')->get();
        return view('admin.dashboard');
    }
}
