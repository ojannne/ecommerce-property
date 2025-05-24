<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'harga',
        'luas_tanah',
        'luas_bangunan',
        'jumlah_kamar_tidur',
        'jumlah_kamar_mandi',
        'lokasi',
        'tipe_bangunan',
        'status',
        'gambar',
        'user_id',
        'status_sewa',         // tambahkan
        'tampilkan_website'    // tambahkan
    ];

    protected $casts = [
        'gambar' => 'array'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
