<?php

namespace App\Http\Controllers;

use App\Models\SubSeksi;
use App\Models\Seksi;
use Illuminate\Http\Request;

class SubSeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data SubSeksi
        $sub_seksis = SubSeksi::all();
        $seksis = Seksi::all();
        return view('sub_seksi.index', compact('sub_seksis', 'seksis'));
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
            'seksi_id' => 'required|exists:seksis,id',
            'nama' => 'required|unique:sub_seksis|max:255',
        ]);

        // Membuat SubSeksi baru
        SubSeksi::create([
            'seksi_id' => $request->seksi_id,
            'nama' => $request->nama,
        ]);

        return redirect()->route('sub_seksi.index')->with('success', 'SubSeksi sukses ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubSeksi $sub_seksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubSeksi $sub_seksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubSeksi $sub_seksi)
    {
        // Validasi input
        $request->validate([
            'seksi_id' => 'required|exists:seksis,id',
            'nama' => 'required|unique:sub_seksis,nama,' . $sub_seksi->id . '|max:255',
        ]);

        // Memperbarui data SubSeksi
        $sub_seksi->update([
            'seksi_id' => $request->seksi_id,
            'nama' => $request->nama,
        ]);

        return redirect()->route('sub_seksi.index')->with('success', 'SubSeksi sukses diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubSeksi $sub_seksi)
    {
        // Menghapus data SubSeksi
        $sub_seksi->delete();

        return redirect()->route('sub_seksi.index')->with('success', 'SubSeksi sukses dihapus.');
    }
}
