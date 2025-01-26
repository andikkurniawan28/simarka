<?php

namespace App\Http\Controllers;

use App\Models\Seksi;
use App\Models\Bagian;
use Illuminate\Http\Request;

class SeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data Seksi
        $seksis = Seksi::all();
        $bagians = Bagian::all();
        return view('seksi.index', compact('seksis', 'bagians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'bagian_id' => 'required|exists:bagians,id',
            'nama' => 'required|unique:seksis|max:255',
        ]);

        // Membuat Seksi baru
        Seksi::create([
            'bagian_id' => $request->bagian_id,
            'nama' => $request->nama,
        ]);

        return redirect()->route('seksi.index')->with('success', 'Seksi sukses ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seksi $seksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seksi $seksi)
    {
        // Menampilkan form edit Seksi dengan data Bagian
        $bagians = Bagian::all();
        return view('seksi.edit', compact('seksi', 'bagians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seksi $seksi)
    {
        // Validasi input
        $request->validate([
            'bagian_id' => 'required|exists:bagians,id',
            'nama' => 'required|unique:seksis,nama,' . $seksi->id . '|max:255',
        ]);

        // Memperbarui data Seksi
        $seksi->update([
            'bagian_id' => $request->bagian_id,
            'nama' => $request->nama,
        ]);

        return redirect()->route('seksi.index')->with('success', 'Seksi sukses diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seksi $seksi)
    {
        // Menghapus data Seksi
        $seksi->delete();

        return redirect()->route('seksi.index')->with('success', 'Seksi sukses dihapus.');
    }
}
