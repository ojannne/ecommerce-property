<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    // Index - Admin lihat semua, User hanya lihat punya sendiri
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $buildings = Building::all(); // Admin lihat semua
        } else {
            $buildings = Building::where('user_id', Auth::id())->get(); // User hanya lihat miliknya
        }

        return Auth::user()->role === 'admin'
            ? view('admin.buildings.list', compact('buildings'))
            : view('user.buildings.list', compact('buildings'));
    }

    // Create - semua user bisa akses form
    public function create()
    {
        return Auth::user()->role === 'admin'
            ? view('admin.buildings.add')
            : view('user.buildings.add');
    }

    // Store - semua user bisa tambah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|string',
            'lokasi' => 'required|string',
            'tipe_bangunan' => 'required|in:rumah,apartemen,ruko,kantor,gudang',
            'deskripsi' => 'required|string',
            'luas_tanah' => 'required|numeric',
            'luas_bangunan' => 'required|numeric',
            'jumlah_kamar_tidur' => 'nullable|integer|min:0',
            'jumlah_kamar_mandi' => 'nullable|integer|min:0',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'lokasi.required' => 'Lokasi harus diisi.',
            'tipe_bangunan.required' => 'Tipe bangunan harus dipilih.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'luas_tanah.required' => 'Luas tanah harus diisi.',
            'luas_bangunan.required' => 'Luas bangunan harus diisi.',
            'luas_tanah.numeric' => 'Luas tanah harus berupa angka.',
            'luas_bangunan.numeric' => 'Luas bangunan harus berupa angka.',
            'gambar.*.image' => 'File harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'gambar.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Bersihkan harga
        $validated['harga'] = (int)str_replace(['.', ','], '', $validated['harga']);

        // Set jumlah kamar default
        $validated['jumlah_kamar_tidur'] = $request->input('jumlah_kamar_tidur', 0);
        $validated['jumlah_kamar_mandi'] = $request->input('jumlah_kamar_mandi', 0);

        // Upload gambar
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $key => $file) {
                $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/building_images', $filename);
                $gambarPaths[] = '/storage/building_images/' . $filename;
            }
        }

        // Set user_id dan simpan
        $validated['user_id'] = Auth::id();
        $validated['gambar'] = $gambarPaths;

        Building::create($validated);

        return redirect()->route(Auth::user()->role === 'admin' ? 'buildings.index' : 'user.buildings.index')
            ->with('success', 'Bangunan berhasil ditambahkan.');
    }

    // Show - Admin & Pemilik bisa lihat
    public function show(Building $building)
    {
        if ($building->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return Auth::user()->role === 'admin'
            ? view('admin.buildings.show', compact('building'))
            : view('user.buildings.show', compact('building'));
    }

    // Edit - hanya pemilik atau admin
    public function edit(Building $building)
    {
        if ($building->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return Auth::user()->role === 'admin'
            ? view('admin.buildings.edit', compact('building'))
            : view('user.buildings.edit', compact('building'));
    }

    // Update - hanya pemilik atau admin
    public function update(Request $request, Building $building)
    {
        if ($building->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|string',
            'lokasi' => 'required|string',
            'tipe_bangunan' => 'required|in:rumah,apartemen,ruko,kantor,gudang',
            'deskripsi' => 'required|string',
            'luas_tanah' => 'required|numeric',
            'luas_bangunan' => 'required|numeric',
            'jumlah_kamar_tidur' => 'nullable|integer|min:0',
            'jumlah_kamar_mandi' => 'nullable|integer|min:0',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'lokasi.required' => 'Lokasi harus diisi.',
            'tipe_bangunan.required' => 'Tipe bangunan harus dipilih.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'luas_tanah.required' => 'Luas tanah harus diisi.',
            'luas_bangunan.required' => 'Luas bangunan harus diisi.',
            'luas_tanah.numeric' => 'Luas tanah harus berupa angka.',
            'luas_bangunan.numeric' => 'Luas bangunan harus berupa angka.',
            'gambar.*.image' => 'File harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'gambar.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Bersihkan harga
        $validated['harga'] = (int)str_replace(['.', ','], '', $validated['harga']);

        // Set jumlah kamar default
        $validated['jumlah_kamar_tidur'] = $request->input('jumlah_kamar_tidur', 0);
        $validated['jumlah_kamar_mandi'] = $request->input('jumlah_kamar_mandi', 0);

        $gambarPaths = $building->gambar ?? [];

        // Hapus gambar yang dicentang
        if ($request->has('hapus_gambar')) {
            foreach ($request->input('hapus_gambar') as $img) {
                if (($key = array_search($img, $gambarPaths)) !== false) {
                    unset($gambarPaths[$key]);

                    // Hapus file dari storage
                    $path = str_replace('/storage', 'public', $img);
                    Storage::delete($path);
                }
            }
        }

        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $key => $file) {
                $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/building_images', $filename);
                $gambarPaths[] = '/storage/building_images/' . $filename;
            }
        }

        $validated['gambar'] = array_values($gambarPaths); // Reindex array

        $building->update($validated);

        return redirect()->route(Auth::user()->role === 'admin' ? 'buildings.index' : 'user.buildings.index')
            ->with('success', 'Bangunan berhasil diperbarui.');
    }

    // Destroy - admin bisa hapus semua, user hanya bisa hapus miliknya
    public function destroy(Building $building)
    {
        if ($building->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        if ($building->gambar) {
            foreach ($building->gambar as $url) {
                $path = str_replace('/storage', 'public', $url);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
        }

        $building->delete();

        return back()->with('success', 'Bangunan berhasil dihapus.');
    }

    // Mark as sold / disewa
    public function markAsSold(Building $building)
    {
        if ($building->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $building->update([
            'status_sewa' => $building->status_sewa === 'disewa' ? 'kosong' : 'disewa'
        ]);

        return back()->with('success', 'Status sewa berhasil diubah.');
    }

    // Toggle tampilkan website
    public function toggleWebsiteStatus(Building $building)
    {
        if ($building->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $building->update([
            'tampilkan_website' => !$building->tampilkan_website
        ]);

        return back()->with('success', 'Status tampil di website berhasil diubah.');
    }
}