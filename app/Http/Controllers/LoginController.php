<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginCheck(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if(auth()->user()->status === 'Actived') {
                if (auth()->user()->level == 'admin') {
                    return redirect()->route('admIndex');
                }else if (auth()->user()->level == 'user') {
                    return redirect()->route('usrIndex');
                }else{
                    return redirect()->route('/');
                }
            }else{
                return redirect()->route('login')
                ->with('errormsg', 'Akun belum terverifikasi');
            }
        }else{
            return redirect()->route('login')
                ->with('errormsg', 'Email atau password yang dimasukkan salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
