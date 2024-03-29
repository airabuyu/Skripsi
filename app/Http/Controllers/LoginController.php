<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    //
    public function index(){

        return view('login');
    }

    public function testview(){

        return view('testpage');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if($request->remember_me){
                Cookie::queue('user_name',$request->user_name,60);
                Cookie::queue('password',$request->password,60);
            }
            return redirect()->intended('/dashboard');
        }
        return back()->with(['fail' => 'fail']);
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
