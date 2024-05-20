<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewas = Penyewa::all();
        return view('penyewas.index', compact('penyewas'));
    }

    public function create()
    {
        return view('penyewas.create');
    }

    public function store(Request $request)
    {
        Penyewa::create($request->validate([
            'invoice_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]));

        return redirect()->route('penyewas.index')->with('success', 'Penyewa created successfully.');
    }

    public function show(Penyewa $penyewa)
    {
        return view('penyewas.show', compact('penyewa'));
    }

    public function edit(Penyewa $penyewa)
    {
        return view('penyewas.edit', compact('penyewa'));
    }

    public function update(Request $request, Penyewa $penyewa)
    {
        $penyewa->update($request->validate([
            'invoice_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]));

        return redirect()->route('penyewas.index')->with('success', 'Penyewa updated successfully.');
    }

    public function destroy(Penyewa $penyewa)
    {
        $penyewa->delete();

        return redirect()->route('penyewas.index')->with('success', 'Penyewa deleted successfully.');
    }
}
