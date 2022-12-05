<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $buku = buku::all()->published();
        $buku = DB::table('bukus')->paginate(5);

        if(Auth::user()->level=='admin')
            return view('admin\admBukuIndex')->with([
                'buku' => $buku,
                'i' => 0,
            ]);
        else
            return view('user\usrBukuIndex')->with([
                'buku' => $buku,
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
        $data = new Buku();

        $this->validate($request, [
            'cover' => 'mimes:jpeg,png',
        ]);

        $request->file('cover')->move('upload/', $request->file('cover')->getClientOriginalName());

        $data->file_name = $request->file('cover')->getClientOriginalName();

        $data->judul = $request->input('judul');
        $data->pengarang = $request->input('pengarang');
        $data->penerbit = $request->input('penerbit');
        $data->tahun_terbit = $request->input('tahun_terbit');
        $data->genre_buku = $request->input('genre_buku');

        $data->save();

        return redirect()->route('admBukuIndex')->with('success', 'Data buku baru telah berhasil ditambahkan');
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
        $mahasiswa =mahasiswa::where('user_id', '=', Auth::user()->id)->first();

        if(Auth::user()->level=='admin')
            return view('admin\bukuEdit', compact('buku'));
        else
            return view('user\usrBukuInfo')->with([
                'buku' => $buku,
                'mahasiswa' => $mahasiswa,
            ]);
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

        return redirect()->route('admBukuIndex')->with('success', 'Data buku telah berhasil diubah');
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

        return redirect()->route('admBukuIndex')->with('success', 'Data buku telah berhasil dihapus');
    }

    public function search(Request $request){
        $cari = $request->input('cari');

        $buku = DB::table('bukus')
            ->where('judul', 'like', "%".$cari."%")
            ->paginate();

        if(Auth::user()->level=='admin')
        return view('admin\admBukuIndex')->with([
            'buku' => $buku,
            'i' => 0,
        ]);
        else
        return view('user\usrBukuIndex')->with([
            'buku' => $buku,
            'i' => 0,
        ]);
    }

    public function showUsr(){
        $buku = buku::paginate(8);

        return view('user\usrIndex')->with([
            'buku' => $buku,
            'i' => 0,
        ]);
    }
}
