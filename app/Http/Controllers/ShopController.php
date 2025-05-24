<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index()
    {
        // Ambil data awal (hanya halaman pertama)
        $buildings = Building::where('tampilkan_website', true)->paginate(6);
        $lands = Land::where('tampilkan_website', true)->paginate(6);

        $allProperties = $buildings->concat($lands);

        $propertyTypes = Building::distinct()->pluck('tipe_bangunan')->toArray();

        // Hitung total halaman untuk load more
        $buildingCount = Building::where('tampilkan_website', true)->count();
        $landCount = Land::where('tampilkan_website', true)->count();

        $totalItems = $buildingCount + $landCount;
        $perPage = 6;
        $totalPages = ceil($totalItems / $perPage);

        return view('frontside.shop', compact(
            'allProperties',
            'propertyTypes',
            'totalPages'
        ));
    }
    //untuk detail
    public function show($type, $id)
    {
        if ($type === 'building') {
            $building = Building::find($id);
            if (!$building) {
                abort(404, 'Properti tidak ditemukan');
            }
            return view('frontside.property-details', compact('building'));
        } elseif ($type === 'land') {
            $land = Land::find($id);
            if (!$land) {
                abort(404, 'Properti tidak ditemukan');
            }
            return view('frontside.property-land-details', compact('land'));
        }

        abort(404, 'Jenis properti tidak diketahui');
    }

    public function loadMore(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 6;

        // Ambil data Building & Land
        $buildings = Building::where('tampilkan_website', true)->skip(($page - 1) * $perPage)->take($perPage)->get();
        $lands = Land::where('tampilkan_website', true)->skip(($page - 1) * $perPage)->take($perPage)->get();

        // Gabung hasil
        $properties = $buildings->concat($lands);

        return view('frontside._property-cards', compact('properties'))->render();
    }
}
