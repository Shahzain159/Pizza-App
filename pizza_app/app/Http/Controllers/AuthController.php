<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function login(){
        return view("Admin.login");
    }
    public function loginpost(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }
        // $user = new User();
        // $user->name = "Admin";
        // $user->email = "admin@gmail.com";
        // $user->password = bcrypt("admin12345");
        // $user->address = "Sample Address";
        // $user->phone_number = "0342352623";
        // $user->is_admin = 1;
        // $user->save();
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect(route('adminlogin'));
    }
}
