<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Banner::all();
        return view('admin.banner.list', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('banners', 'public');
        }

        Banner::create($validatedData);

        return redirect()->route('banner.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $validatedData['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($validatedData);

        return redirect()->route('banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        // Hapus gambar dari penyimpanan
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}