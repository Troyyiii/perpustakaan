<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\mahasiswa;
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

        $user = new User();
        $mhs_data = new mahasiswa();

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        $latestUser = User::latest()->get();

        foreach ($latestUser as $item) {
            $idUser = $item->id;
        }

        $mhs_data->nrp = $request->input('nrp');
        $mhs_data->nama = $request->input('name');
        $mhs_data->kelas = $request->input('kelas');
        $mhs_data->no_hp = $request->input('no_hp');
        $mhs_data->tahun_angkatan = $request->input('tahun_angkatan');
        $mhs_data->user_id = $idUser;

        $mhs_data->save();

        return redirect('/login')->with('scsregistmsg', 'Akun telah berhasil dibuat, silahkan tunggu untuk diverifikasi');
    }
}
