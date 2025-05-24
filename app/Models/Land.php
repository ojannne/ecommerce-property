<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'harga',
        'lokasi',
        'status',
        'kategori',
        'luas_tanah',
        'sertifikat',
        'gambar',
        'tampilkan_website',
        'user_id'
    ];

    protected $casts = [
        'gambar' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
