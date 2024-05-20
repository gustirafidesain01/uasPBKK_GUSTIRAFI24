<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    public function index()
    {
        $sewas = Sewa::all();
        return view('sewas.index', compact('sewas'));
    }

    public function create()
    {
        return view('sewas.create');
    }

    public function store(Request $request)
    {
        Sewa::create($request->validate([
            'penyewa_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'total_pembayaran' => 'required|numeric',
        ]));

        return redirect()->route('sewas.index')->with('success', 'Sewa berhasil ditambahkan.');
    }

    public function show(Sewa $sewa)
    {
        return view('sewas.show', compact('sewa'));
    }

    public function edit(Sewa $sewa)
    {
        return view('sewas.edit', compact('sewa'));
    }

    public function update(Request $request, Sewa $sewa)
    {
        $sewa->update($request->validate([
            'penyewa_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'total_pembayaran' => 'required|numeric',
        ]));

        return redirect()->route('sewas.index')->with('success', 'Sewa berhasil diperbarui.');
    }

    public function destroy(Sewa $sewa)
    {
        $sewa->delete();

        return redirect()->route('sewas.index')->with('success', 'Sewa berhasil dihapus.');
    }
}
