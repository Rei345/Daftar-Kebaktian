<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ibadah extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_ibadah',
        'nama_minggu',
        'tema_khotbah',
        'version_code',
        'evangelium',
        'epistel',
        's_patik',
        'daftar_ende', // Ini akan di-cast sebagai array/json
    ];

    protected $casts = [
        'tanggal_ibadah' => 'date',
        'daftar_ende' => 'array', // Penting untuk menangani JSON di database
    ];
}
