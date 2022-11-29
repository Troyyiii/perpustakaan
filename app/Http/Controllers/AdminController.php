<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pinjam;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{
    public function index(){
        $unuser = User::all()->where('status', 'Unactived');
        $unpinjam = pinjam::all()->where('stats', 'Pending');

        return view('admin\admIndex')->with([
            'inactive' => $unuser,
            'pendingPinjam' => $unpinjam,
            'i' => 0,
            'y' => 0,
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

    public function verifyPjm(Request $request, $id){
        $dataPjm = pinjam::find($id);
        if($dataPjm){
            $dataPjm->stats = 'Sedang Dipinjam';
            $dataPjm->save();
        }

        return redirect()->route('admIndex')
            ->with('successPjm', 'Akun telah berhasil diverifikasi');
    }

    public function showProfile($id){
        $data = user::find($id);

        return view('admin\admProfile')->with('profil', $data);
    }
}
