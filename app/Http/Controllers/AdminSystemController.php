<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminData;
use Illuminate\Support\Facades\Auth;

class AdminSystemController extends Controller
{
    public function loginsystem(Request $request){
        $admin = AdminData::where([
                'nipd' => $request->nipd,
                'password' => $request->password
            ])->first();
        if($admin){
            Auth::guard('admin')->login($admin);
            if(Auth::guard('admin')->check()){
                return redirect('/admin/beranda')->with('status','Login Berhasil');
            }
        }else{
            return redirect('/admin/login')->with('status','Login Gagal');
        }

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login')->with('status','Logout Berhasil');
    }

    // public function registersystem(Request $request){
    //     request()->validate([
    //         'nipd' => 'required',
    //         'password' => 'required',
    //         'confirmpassword' => 'required|same:password'
    //     ]);
    //     AdminData::create([
    //         'nipd' => $request->nipd,
    //         'password' => bcrypt($request->password)
    //     ]);
    // }
}

