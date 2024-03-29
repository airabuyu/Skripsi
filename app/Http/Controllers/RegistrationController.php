<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Input;
class RegistrationController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('register', compact('roles'));
    }

    public function store(Request $request)
    {        
        // $validateData['password'] = Input::get('role_id') == 'true' ? 1 : 0;
        // dd($request->all());
        $validateData = $request->validate([
            'user_name' => 'required|max:100',
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:100',
            'date_of_birth' => 'required',
            'phone_number' => 'required|numeric',
            'department' => 'required|max:100',
            'status' => 'required|max:100',
            'user_img',
            'is_active' => 'required',
            'role_id' => 'required',
        ]);
        
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);

        return redirect('/homeregister')->with(['success' => 'success']);
    }
}
