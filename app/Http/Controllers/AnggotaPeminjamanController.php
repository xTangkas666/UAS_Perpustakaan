<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnggotaPeminjamanController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $peminjaman = DB::table('peminjaman')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->join('users', 'users.id', '=', 'anggota.id_user')
            ->select('buku.judul', 'anggota.nama', 'peminjaman.*')
            ->where('users.id', $id)
            ->get();
        return view('levelAnggota.peminjaman.index', compact('peminjaman'));
    }

    public function show(string $id): View
    {
        $peminjaman = DB::table('peminjaman')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->select('buku.judul', 'anggota.nama', 'peminjaman.*')
            ->where('peminjaman.id_peminjaman', $id)
            ->first();
        return view('levelAnggota.peminjaman.detail', compact('peminjaman'));
    }
}
