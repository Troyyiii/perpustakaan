<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pinjam;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $unuser = User::all()->where('status', 'Unactived');
        $unpinjam = pinjam::all()->where('stats', 'Pending');

        return view('admin\admIndex')->with([
            'inactive' => $unuser,
            'pendingPinjam' => $unpinjam,
        ]);
    }

    public function verify(Request $request, $id){
        $userMhs = user::find($id);
        if($userMhs){
            $userMhs->status = 'Actived';
            $userMhs->save();
        }

        return redirect()->route('admIndex')
            ->with('success', 'Akun telah berhasil diverifikasi');
    }
}
