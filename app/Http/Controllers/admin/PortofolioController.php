<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('admin.portofolio.list', compact('portofolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portofolio.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'pemilik' => 'required|string|max:255',
        'alamat' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
    ]);

    // Upload gambar jika ada
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('portofolios', 'public');
        $validatedData['gambar'] = $path; // Simpan path relatif ke dalam database
    }

    // Simpan ke database
    Portofolio::create($validatedData);

    return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */

    // public function show(Portofolio $portofolio)
    // {
    //     return view('portofolios.show', compact('portofolio'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, Portofolio $portofolio)
{
    // Validasi data
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'pemilik' => 'required|string|max:255',
        'alamat' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Jika ada file gambar baru diupload
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($portofolio->gambar && Storage::disk('public')->exists($portofolio->gambar)) {
            Storage::disk('public')->delete($portofolio->gambar);
        }

        // Simpan gambar baru
        $path = $request->file('gambar')->store('portofolios', 'public');
        $validatedData['gambar'] = $path;
    }

    // Update data ke database
    $portofolio->update($validatedData);

    return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        $portofolio->delete();

        return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil dihapus.');
    }
}