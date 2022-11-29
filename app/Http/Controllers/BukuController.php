<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = buku::all();

        // dd(Auth::user()->level);

        if(Auth::user()->level=='admin')
            return view('admin\admBukuIndex', compact('buku'));
        else
            return view('user\usrBukuIndex', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\bukucreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $nrp = $request->input('nrp');
        // $nama = $request->input('nama');
        // $kelas = $request->input('kelas');
        // $no_hp = $request->input('no_hp');
        // $tahun_angkatan = $request->input('tahun_angkatan');

        // DB::table('mahasiswa')
        //     ->insert([
        //         'nrp' => $nrp,
        //         'nama' => $nama,
        //         'kelas' => $kelas,
        //         'no_hp' => $no_hp,
        //         'tahun_angkatan' => $tahun_angkatan,
        //     ]);

        buku::create($request->all());

        return redirect()->route('admBukuIndex')->with('success', 'Data telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = buku::find($id);

        if(Auth::user()->level=='admin')
            return view('admin\bukuEdit', compact('buku'));
        else
            return view('user\usrBukuInfo', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buku = buku::find($id);
        $buku->update($request->all());
        return redirect()->route('admBukuIndex')->with('success', 'Data telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = buku::find($id);
        $buku->delete();
        return redirect()->route('admBukuIndex')->with('success', 'Data telah berhasil dihapus!');
    }

    public function search(Request $request){
        $cari = $request->input('cari');

        $buku = DB::table('bukus')
            ->where('judul', 'like', "%".$cari."%")
            ->paginate();

        if(Auth::user()->level=='admin')
            return view('admin\admBukuIndex', ['buku' => $buku]);
        else
            return view('user\usrBukuIndex', ['buku' => $buku]);
    }
}
