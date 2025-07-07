<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlkitabVersion extends Model
{
    use HasFactory;

    // Asumsi tabelnya bernama 'alkitab_versions'
    // Jika nama tabel berbeda, tambahkan: protected $table = 'nama_tabel_anda';

    protected $fillable = [
        'code',
        'name',
        // Tambahkan kolom lain jika ada, misal 'language'
    ];

    // Jika Anda tidak ingin timestamps di tabel ini, tambahkan:
    // public $timestamps = false;
}
