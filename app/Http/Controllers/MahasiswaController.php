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
        $mahasiswa = mahasiswa::paginate(10);

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
        mahasiswa::create($request->all());

        return redirect()->route('admMhsIndex')->with('success', 'Data Mahasiswa baru telah berhasil ditambahkan');
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

        return redirect()->route('admMhsIndex')->with('success', 'Data mahasiswa telah berhasil diubah');
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
        $dataUser = User::find($request->id);

        $mahasiswa->delete();
        $dataUser->delete();

        return redirect()->route('admMhsIndex')->with('success', 'Data mahasiswa telah berhasil dihapus');
    }

    public function destroyHome(Request $request, $id)
    {
        $dataUser = User::find($id);
        $mahasiswa = mahasiswa::where('user_id', '=', $dataUser->id)->first();

        $mahasiswa->delete();
        $dataUser->delete();

        return redirect()->route('admIndex')->with('success', 'Data mahasiswa telah berhasil dihapus');
    }

    public function showProfile($id){
        $data = user::find($id);
        $mahasiswa = mahasiswa::where('user_id', '=', $data->id)->first();

        return view('user\usrProfile')->with('profil', $mahasiswa);
    }
}
