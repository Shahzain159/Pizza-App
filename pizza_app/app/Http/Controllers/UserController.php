<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function home(){
        $pizzas = pizza::all();
        $slider = Pizza::take(3)->get();
        return view('User.home',compact('pizzas' , 'slider'));
    }

    public function deals_action(){
        return view('User.deals');
    }

    public function user_register(){
        return view('User.register');
    }
    public function user_register_post(Request $request){

         $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        ]);


        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);

        $user->save();
        return redirect()->back()->with('success', 'User registered successfully!');
    }

    public function user_login(){
        return view('User.login');
    }
    public function user_login_post(Request $request){

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->back()->with('success', 'User Login successfully!');
        }
    }
    public function userlogout(){
        Auth::logout();
        Session::flush();
        return redirect(route('login'));
    }

}
