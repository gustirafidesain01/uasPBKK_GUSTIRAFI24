<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Sewa; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SewaController extends Controller
{
    public function index(): View
    {
       $dataSewa = Sewa::latest()->paginate(10); 
       return view('sewa.index', compact('dataSewa')); 
    }

    public function create(): View
    {
        return view('sewa.create'); 
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'nama_sewa' => 'required|min:2|unique:sewa,nama_sewa' 
        ]);

        Sewa::create([
            'nama_sewa' => $request->nama_sewa, 
        ]);
        // Redirect to index
        return redirect()->route('sewa.index')->with(['success' => 'Data Berhasil Disimpan!']); 
    }

    public function edit(string $id): View
    {
        $dataSewa = Sewa::findOrFail($id); 
        return view('sewa.edit', compact('dataSewa')); 
    }

    public function show(string $id): View
    {
        $sewa = Sewa::findOrFail($id); 

        return view('sewa.show', compact('sewa')); 
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'nama_sewa' => 'required|min:2' 
        ]);

        $dataSewa = Sewa::findOrFail($id); 
        $dataSewa->update([
            'nama_sewa' => $request->nama_sewa 
        ]);

        return redirect()->route('sewa.index')->with(['success' => 'Data Berhasil Diubah!']); 
    }

    public function destroy($id): RedirectResponse
    {
        $sewa = Sewa::findOrFail($id); 
        $sewa->delete();
        return redirect()->route('sewa.index')->with(['success' => 'Data Berhasil Dihapus!']); 
    }
}
