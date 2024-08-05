<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KwitansiController extends Controller
{
    public function index(): View
    {
        $dataKwitansi = Kwitansi::latest()->paginate(10);
        return view('kwitansi.index', compact('dataKwitansi'));
    }

    public function create(): View
    {
        return view('kwitansi.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
            'nomor_kwitansi' => 'required|min:2|unique:kwitansi,nomor_kwitansi',
            'tanggal'        => 'required|date',
            'jumlah'         => 'required|numeric'
        ]);

        Kwitansi::create([
            'nomor_kwitansi' => $request->nomor_kwitansi,
            'tanggal'        => $request->tanggal,
            'jumlah'         => $request->jumlah
        ]);

        // Redirect to index
        return redirect()->route('kwitansi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataKwitansi = Kwitansi::findOrFail($id);
        return view('kwitansi.edit', compact('dataKwitansi'));
    }

    public function show(string $id): View
    {
        $kwitansi = Kwitansi::findOrFail($id);
        return view('kwitansi.show', compact('kwitansi'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form
        $request->validate([
            'nomor_kwitansi' => 'required|min:2',
            'tanggal'        => 'required|date',
            'jumlah'         => 'required|numeric'
        ]);

        $dataKwitansi = Kwitansi::findOrFail($id);
        $dataKwitansi->update([
            'nomor_kwitansi' => $request->nomor_kwitansi,
            'tanggal'        => $request->tanggal,
            'jumlah'         => $request->jumlah
        ]);

        return redirect()->route('kwitansi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $kwitansi = Kwitansi::findOrFail($id);
        $kwitansi->delete();
        return redirect()->route('kwitansi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
