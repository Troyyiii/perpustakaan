<?php

namespace App\Http\Controllers;

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
}
