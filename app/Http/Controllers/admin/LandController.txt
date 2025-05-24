<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LandController extends Controller
{
    // Index - Admin lihat semua, User hanya lihat miliknya
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $lands = Land::all(); // Admin lihat semua data
        } else {
            $lands = Land::where('user_id', Auth::id())->get(); // User hanya lihat punya sendiri
        }

        return Auth::user()->role === 'admin'
            ? view('admin.lands.list', compact('lands'))
            : view('user.lands.list', compact('lands'));
    }

    // Create - semua user bisa akses form
    public function create()
    {
        return Auth::user()->role === 'admin'
            ? view('admin.lands.add')
            : view('user.lands.add');
    }

    // Store - semua user bisa tambah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|string',
            'lokasi' => 'required|string',
            'luas_tanah' => 'required|numeric|min:0',
            'kategori' => 'required|in:tanah_kosong,sawah,kebun,lainnya',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:tersedia,disewa',
            'sertifikat' => 'nullable|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'lokasi.required' => 'Lokasi harus diisi.',
            'luas_tanah.required' => 'Luas tanah harus diisi.',
            'luas_tanah.numeric' => 'Luas tanah harus berupa angka.',
            'luas_tanah.min' => 'Luas tanah tidak boleh negatif.',
            'kategori.required' => 'Kategori harus dipilih.',
            'status.required' => 'Status harus dipilih.',
            'gambar.*.image' => 'File harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'gambar.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Bersihkan harga
        $validated['harga'] = (int)str_replace(['.', ','], '', $validated['harga']);

        $gambarPaths = [];

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $key => $file) {
                $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/land_images', $filename);
                $gambarPaths[] = '/storage/land_images/' . $filename;
            }
        }

        $validated['user_id'] = Auth::id();
        $validated['gambar'] = json_encode($gambarPaths);

        Land::create($validated);

        return redirect()
            ->route(Auth::user()->role === 'admin' ? 'lands.index' : 'user.lands.index')
            ->with('success', 'Tanah berhasil ditambahkan.');
    }

    // Show - Admin & Pemilik bisa lihat
    public function show(Land $land)
    {
        if ($land->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return Auth::user()->role === 'admin'
            ? view('admin.lands.show', compact('land'))
            : view('user.lands.show', compact('land'));
    }

    // Edit - hanya pemilik atau admin
    public function edit(Land $land)
    {
        if ($land->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return Auth::user()->role === 'admin'
            ? view('admin.lands.edit', compact('land'))
            : view('user.lands.edit', compact('land'));
    }

    // Update - hanya pemilik atau admin
    public function update(Request $request, Land $land)
    {
        if ($land->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|string',
            'lokasi' => 'required|string',
            'luas_tanah' => 'required|numeric|min:0',
            'kategori' => 'required|in:tanah_kosong,sawah,kebun,lainnya',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:tersedia,disewa',
            'sertifikat' => 'nullable|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'lokasi.required' => 'Lokasi harus diisi.',
            'luas_tanah.required' => 'Luas tanah harus diisi.',
            'luas_tanah.numeric' => 'Luas tanah harus berupa angka.',
            'luas_tanah.min' => 'Luas tanah tidak boleh negatif.',
            'kategori.required' => 'Kategori harus dipilih.',
            'status.required' => 'Status harus dipilih.',
            'gambar.*.image' => 'File harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'gambar.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Bersihkan harga
        $validated['harga'] = (int)str_replace(['.', ','], '', $validated['harga']);

        $existingGambar = is_string($land->gambar) ? json_decode($land->gambar, true) : $land->gambar;
        if (!is_array($existingGambar)) {
            $existingGambar = [];
        }

        // Hapus gambar yang dicentang
        if ($request->has('hapus_gambar')) {
            foreach ($request->input('hapus_gambar', []) as $path) {
                $filename = basename($path);
                $filePath = 'public/land_images/' . $filename;

                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }

                $existingGambar = array_filter($existingGambar, fn($item) => basename($item) !== $filename);
            }
        }

        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $key => $file) {
                $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/land_images', $filename);
                $existingGambar[] = '/storage/land_images/' . $filename;
            }
        }

        $validated['user_id'] = Auth::id();
        $validated['gambar'] = json_encode(array_values($existingGambar));

        $land->update($validated);

        return redirect()
            ->route(Auth::user()->role === 'admin' ? 'lands.index' : 'user.lands.index')
            ->with('success', 'Tanah berhasil diperbarui.');
    }

    // Destroy - admin bisa hapus semua, user hanya bisa hapus miliknya
    public function destroy(Land $land)
    {
        if ($land->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        // Hapus file gambar
        $existingGambar = is_string($land->gambar) ? json_decode($land->gambar, true) : $land->gambar;
        if (is_array($existingGambar)) {
            foreach ($existingGambar as $path) {
                $filename = basename($path);
                $filePath = 'public/land_images/' . $filename;

                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }
            }
        }

        $land->delete();

        return back()
            ->with('success', 'Tanah berhasil dihapus.');
    }

    public function toggleWebsiteStatus(Land $land)
    {
        if ($land->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $land->update([
            'tampilkan_website' => !$land->tampilkan_website
        ]);

        return back()->with('success', 'Status tampil di website berhasil diubah.');
    }
}
