<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Role;
class UserController extends Controller
{
    public function usershowsearch()
    {
        $users = User::getPaginationUser();
        $stringSearch = 0;
        if(request('search') != null)
        {
            $stringSearch = request('search');
            $users = DB::table('users')->where('name','like','%'.$stringSearch.'%')
            ->paginate(8)->withQueryString();

        }

        return view('homeregister', compact('users'));
    }

    public function userdetail($userid)
    {
        $userdetails = User::where('id', $userid)->first();
        $roles = Role::All();
        // dd($userdetails);
        return view('userdetail', compact('userdetails','roles'));
    }

    public function resetPassword($userid)
    {
        //ada yang salah, udah kereset tapi ga bisa login
        $userdetails = User::where('id', $userid)->first();
        // dd($userdetails->user_name);
        User::find($userid)->update([
            'password' => Hash::make($userdetails->user_name)
        ]);

        return redirect('/homeregister');
    }

    public function updateUser(Request $request,$id)
    {

        $request->validate([
            'user_name' => 'required|max:50',
            'name' => 'required',
            'email' => 'required|max:50',
            'password' => 'required',
            'phone_number' => 'required|numeric',
            'user_img',
            'is_active',
            'role_id' => 'required',
        ]);
        $setcheck = $request->is_active;
        if($setcheck != 1)
        {
            $setcheck = 0;
        }

        User::find($id)->update([
            'user_name' => $request->user_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'user_img',
            'is_active' => $setcheck,
            'role_id' => $request->role_id,
        ]);

        return redirect('/homeregister');
    }

}
