<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\property;
use App\Models\Banner;
use App\Models\Building;
use App\Models\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::orderBy('created_at', 'desc')->take(3)->get();
        $buildings = Building::where('tampilkan_website', true)->take(3)->get();
        $rekomendasi = Building::where('status', 'Dijual')->take(6)->get();
        $banners = Banner::where('status', true)->get();
        return view('frontside.home', compact('testimonis', 'banners', 'buildings', 'rekomendasi'));
    }
    //untuk detail
    public function show($id)
    {
        // Ambil satu properti beserta relasi (misalnya user)
        $building = Building::with('user')->findOrFail($id);

        // Kirim data ke view
        return view('frontside.property-details', compact('building'));
    }
}
