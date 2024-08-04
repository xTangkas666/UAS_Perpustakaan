<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PenulisBukuController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $buku = DB::table('buku')
            ->join('penulis', 'penulis.id_penulis', '=', 'buku.id_penulis')
            ->join('rak', 'rak.id_rak', '=', 'buku.id_rak')
            ->join('users', 'users.id', '=', 'penulis.id_user')
            ->select('penulis.nama_penulis', 'rak.lokasi', 'buku.*')
            ->where('users.id', $id)
            ->get();
        return view('levelPenulis.buku.index', compact('buku'));
    }

    public function show(string $id): View
    {
        $buku = DB::table('buku')
            ->join('penulis', 'penulis.id_penulis', '=', 'buku.id_penulis')
            ->join('rak', 'rak.id_rak', '=', 'buku.id_rak')
            ->select('penulis.nama_penulis', 'rak.lokasi', 'buku.*')
            ->where('buku.no_buku', $id)
            ->first();
        return view('levelPenulis.buku.detail', compact('buku'));
    }
}
