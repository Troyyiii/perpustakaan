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
        $pinjam->tanggal_pinjam = Carbon::now();

        $pinjam->save();

        //buku
        $buku->status = "Terpinjam";

        $buku->update();

        // mahasiswa
        $mahasiswa->status = "Meminjam";

        $mahasiswa->update();

        return redirect()->route('usrBukuIndex', $id)->with('success', 'Permintaan peminjaman buku berhasil diajukan, mohon tunggu diverifikasi oleh pustakawan');
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
        $mahasiswa = mahasiswa::where('id', '=', $kembali->user_id)->first();

        //kembali
        $kembali->stats = "Telah Dikembalikan";
        $kembali->tanggal_kembali = Carbon::now();

        $kembali->save();

        //buku
        $var_buku = ['status' => 'Tersedia'];

        $buku->update($var_buku);

        // mahasiswa
        $mahasiswa->status = "Bebas";

        $mahasiswa->update();

        return redirect()->route('admPinjamIndex', $id)->with('success', 'Pengembalian berhasil, buku telah dikembalikan');
    }

    public function destroy(Request $request, $id)
    {
        $pinjam = pinjam::find($id);

        $pinjam->delete();

        return redirect()->route('admPinjamIndex')->with('success', 'Data peminjaman telah berhasil dihapus');
    }

    public function destroyHome(Request $request, $id)
    {
        $pinjam = pinjam::find($id);
        $buku = buku::where('id', '=', $pinjam->buku_id)->first();
        $mahasiswa = mahasiswa::where('id', '=', $pinjam->user_id)->first();

        // buku
        $buku->status = "Tersedia";
        $buku->save();

        // mahasiswa
        $mahasiswa->status = "Bebas";
        $mahasiswa->save();

        // pinjam
        $pinjam->delete();

        return redirect()->route('admIndex')->with('successPjm', 'Pengajuan peminjaman buku telah dibatalkan');
    }

    public function history(){
        $pinjam = pinjam::where('stats', '=', 'Telah Dikembalikan')->get();

        return view('admin\admHistoryPinjam', [
            'pinjam' => $pinjam,
            'i' => 0,
        ]);
    }
}
