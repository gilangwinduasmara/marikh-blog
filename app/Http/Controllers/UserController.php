<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }

    public function registerUser(){
        $validator = Validator::make(request()->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:32',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
        ]);

        return redirect('login');
    }

    public function loginUser(){
        $validator = Validator::make(request()->all(),[
            'email' => 'required|email',
            'password' => 'required|min:8|max:32',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        if(Auth::attempt([
            'email' => request()->email,
            'password' => request()->password
            ])){
            return redirect('dashboard');
        }

        return redirect('login')->withErrors('Login gagal');

    }

    public function dashboard(){
        return view('dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
