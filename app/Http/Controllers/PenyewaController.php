<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kwitansi;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewa = Penyewa::latest()->paginate(10);
        return view('penyewas.index',compact('penyewas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('level', 'penyewas')->get();
        $kwitansi = Kwitansi::all();
        return view('penyewas.create', compact('user', 'kwitansi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penyewa'      => 'required|min:5',
            'jenis_kelamin'     => 'required',
            'alamat_penyewa'    => 'required',
            'kwitansi_id'       => 'required|unique:penyewas,kwitansi_id'
        ]);

        Penyewa::create([
            'user_id'          => $request->user_id,
            'nama_penyewa'     => $request->nama_penyewa, 
            'jenis_kelamin'    => $request->jenis_kelamin,
            'alamat_penyewa'   => $request->alamat_penyewa,
            'kwitansi_id'      => $request->kwitansi_id,
        ]);
       
        return redirect()->route('penyewa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penyewa = Penyewa::findOrFail($id);
        $user = User::where('level', 'penyewa')->get();
        $kwitansi = Kwitansi::all();

        return view('penyewa.edit', compact('penyewa', 'user', 'kwitansi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_penyewa'      => 'required|min:5',
            'jenis_kelamin'     => 'required',
            'alamat_penyewa'    => 'required',
            'kwitansi_id'       => 'required|unique:penyewas,kwitansi_id,' . $id
        ]);

        $penyewa = Penyewa::findOrFail($id);
        $penyewa->update([
            'user_id'          => $request->user_id,
            'nama_penyewa'     => $request->nama_penyewa, 
            'jenis_kelamin'    => $request->jenis_kelamin,
            'alamat_penyewa'   => $request->alamat_penyewa,
            'kwitansi_id'      => $request->kwitansi_id,
        ]);
       
        return redirect()->route('penyewa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyewa = Penyewa::findOrFail($id);
        $penyewa->delete();
        return redirect()->route('penyewa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
