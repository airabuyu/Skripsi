<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        dd($request);
        $user_name = $request->input('user_name');
        $email        = $request->input('email');
        $password     = $request->input('password');
        
        $user = User::create([
            'user_name'      => $user_name,
            'email'     => $email,
            'password'  => Hash::make($password)
        ]);

        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'Register Berhasil!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register Gagal!'
            ], 400);
        }

        return redirect()->to('/question_editor');
    }
}
