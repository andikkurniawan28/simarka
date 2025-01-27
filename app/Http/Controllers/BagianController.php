<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data Bagian
        $bagians = Bagian::all();
        // return $bagians;
        return view('bagian.index', compact('bagians'));
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
            'nama' => 'required|unique:bagians|max:255',
        ]);

        // Membuat Bagian baru
        $bagian = Bagian::create([
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('success', 'Bagian sukses ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bagian $bagian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bagian $bagian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bagian $bagian)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|max:255|unique:bagians,nama,' . $bagian->id,
        ]);

        // Memperbarui data Bagian
        $bagian->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('bagian.index')->with('success', 'Bagian sukses diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bagian $bagian)
    {
        // Menghapus data Bagian
        $bagian->delete();

        return redirect()->back()->with('success', 'Bagian sukses dihapus.');
    }
}
