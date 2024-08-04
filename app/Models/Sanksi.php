<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    protected $table = 'sanksi';

    protected $fillable = [
        'id_sanksi',
        'id_peminjaman',
        'jumlah_denda',
        'status',
    ];

    protected $primaryKey = 'id_sanksi';
}
