<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Rules\MatchOldPassword;
use App\Models\User;
use App\Models\Role;
class UserController extends Controller
{
    public function usershowsearch()
    {
        Paginator::useBootstrap();
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

        return redirect('/homeregister')->with(['success' => 'success']);
    }

    public function updateUser(Request $request,$id)
    {

        $request->validate([
            'user_name' => 'required|max:50',
            'name' => 'required',
            'email' => 'required|max:50',
            'phone_number' => 'required|numeric',
            'department' => 'required|max:100',
            'status' => 'required|max:100',
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
            'phone_number' => $request->phone_number,
            'department' => $request->department,
            'status' => $request->status,
            'is_active' => $setcheck,
            'role_id' => $request->role_id,
        ]);

        return redirect('/homeregister')->with(['success' => 'success']);
    }

    public function viewchangepassword()
    {
        return view('changepassword');
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storepassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
        ]);
        
        if (Hash::check($request->current_password, Auth::User()->password) && !Hash::check($request->new_password, Auth::User()->password)) {
                User::find(Auth::User()->id)->update(['password'=> Hash::make($request->new_password)]);
                $boole = 1;
                return redirect('/changepassword',)->with(['success' => 'success']);
        }else
        {
            // with(['fail' => 'Pesan fail']);
                $boole = 0;
                return redirect('/changepassword')->with(['fail' => 'fail']);
        }
        
    }
    public function upload(Request $request)
    {
        
        if($request->hasFile('image')){
            // dd(Auth::User()->user_img);
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('user_img',$filename,'public');
            // $path = '/storage/user_img/';
            // if(Storage::exists($path.Auth::User()->user_img))
            // {
            //     dd(Auth::User()->user_img);
            //     File::delete($path.Auth::User()->user_img);
            // }
            Auth()->user()->update(['user_img'=>$filename]);
            return redirect()->back()->with(['success' => 'success']);
        }
        else{
            return redirect()->back()->with(['fail' => 'fail']);
        }
    }
    
    public function getDataUser()
    {
        return view('changeprofile');
    }
}
