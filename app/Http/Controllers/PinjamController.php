<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\buku;
use App\Models\pinjam;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PinjamController extends Controller
{
    public function pinjam(Request $request, $id){

        //new object
        $mahasiswa = mahasiswa::where('user_id', '=', Auth::user()->id)->first();
        $pinjam = new pinjam();
        $buku = buku::find($id);

        //pinjam
        $pinjam->user_id = $mahasiswa->id;
        $pinjam->buku_id = $id;
        $pinjam->tanggal_pinjam = $request->input('tgl_pinjam');

        $pinjam->save();

        //buku
        $buku->status = "Terpinjam";

        $buku->update();

        return redirect()->route('usrBukuInfo', $id)->with('success', 'Peminjaman buku telah berhasil, mohon tunggu sampai pustakawan memverifikasi data');
    }

    public function indexAdmin(){
        $pinjam = pinjam::all()->where('stats', 'Sedang Dipinjam');

        return view('admin\admPinjamIndex', ['listPinjam' => $pinjam, 'i' => 0]);
    }

    public function indexUser(){
        $mahasiswa = mahasiswa::where('user_id', '=', Auth::user()->id)->first();
        $pinjam = pinjam::all()->where('user_id', $mahasiswa->id);

        return view('user\usrPinjamIndex', ['listPinjam' => $pinjam, 'i' => 0]);
    }

    public function show($id){
        $pinjam = pinjam::find($id);
        $mahasiswa = mahasiswa::where('id', '=', $pinjam->user_id)->get();
        $buku = buku::where('id', '=', $pinjam->buku_id)->get();

        return view('admin\admPinjamInfo', [
            'pinjam' => $pinjam,
            'mahasiswa' => $mahasiswa,
            'buku' => $buku,
        ]);
    }

    public function kembali(Request $request, $id){
        //new object
        $kembali = pinjam::find($id);
        $buku = buku::where('id', '=', $kembali->buku_id)->first();

        //kembali
        $kembali->stats = "Telah Dikembalikan";
        $kembali->tanggal_kembali = Carbon::now();

        $kembali->save();

        //buku
        $var_buku = ['status' => 'Tersedia'];

        $buku->update($var_buku);

        return redirect()->route('admPinjamInfo', $id)->with('success', 'Buku telah berhasil dikembalikan, Terima kasih');
    }
}
