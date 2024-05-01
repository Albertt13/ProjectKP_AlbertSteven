<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(){
        return view('Auth.register');
    }

    public function postregister(Request $request){
        // dd($request->all());
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        //return view('/Auth/login')->with('success','Register Successfully');
        // sleep(5);
        return view('/Auth/login')->with('success', 'Admin has been registered successfully!');
    }

    public function login(){
        return view('Auth.login');
    }
    public function postlogin(Request $request)
    {
        // return view('Auth.login');
        // dd($request->all());
        $credetials = [
            'email'=> $request->email,
            'password'=>$request->password,    
        ];

        if (Auth::attempt($credetials)) {   
            return redirect('')->with('success', 'Login Successfully');
        }

        return back()->with('error', 'Email or Password Salah');
        
        // if (Auth::attempt($request->only('email','password'))) {   
        //     return redirect('');
        // }
        // return redirect('Auth.login');
    }
}
