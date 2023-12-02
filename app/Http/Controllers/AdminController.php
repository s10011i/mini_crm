<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller{
    protected $admin;

    public function __construct(){
        $this->admin = new Admin(); 
    }
    public function loginAdmin(Request $request){
        $admin = $this->admin->where([
            ['username', $request->input('username')],
            ['password', $request->input('password')]
            // ['password', Hash::make($request->input('password'))]
        ])->first();

        // $credentials = $request->validate([
        //     'username' => ['required'],
        //     'password' => ['required'],
        // ]);
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     // return redirect()->intended('dashboard');
        //     return response()->json(['status'=>true,'msg'=>'success']);
        // }
 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
        if($admin){
            return response()->json(['status'=>true,'data'=>$admin],200);
        }
        return response()->json(['status'=>false,'data'=>[]],400);
    }

}
