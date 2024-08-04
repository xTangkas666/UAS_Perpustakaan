<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'id_peminjaman',
        'no_buku',
        'id_anggota',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status',
    ];

    protected $primaryKey = 'id_peminjaman';
}
