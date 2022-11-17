<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registerStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'min:8|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('scsregistmsg', 'Akun telah berhasil dibuat, silahkan tunggu untuk diverifikasi');
    }
}
