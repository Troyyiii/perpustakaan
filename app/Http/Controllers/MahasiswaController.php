<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mahasiswa = DB::table('mahasiswas')
        //     ->orderBy('nrp')
        //     ->get();

        $mahasiswa = mahasiswa::all();

        return view('admin\admMhsIndex')->with([
            'mahasiswa' => $mahasiswa,
            'i' => 0,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\mhsCreate');
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

        mahasiswa::create($request->all());

        return redirect()->route('admMhsIndex')->with('success', 'Data telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = mahasiswa::find($id);
        return view('admin\mhsEdit', compact('mahasiswa'));
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
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->update($request->all());
        return redirect()->route('admMhsIndex')->with('success', 'Data telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->delete();
        $dataUser = User::find($request->id);
        $dataUser->delete();
        return redirect()->route('admMhsIndex')->with('success', 'Data telah berhasil dihapus!');
    }
}
