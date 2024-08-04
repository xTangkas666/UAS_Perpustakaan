<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;

    protected $table = 'penulis';

    protected $fillable = [
        'id_penulis',
        'nama_penulis',
        'tempat_lahir',
        'tgl_lahir',
        'id_user',
    ];

    protected $primaryKey = 'id_penulis';
}
