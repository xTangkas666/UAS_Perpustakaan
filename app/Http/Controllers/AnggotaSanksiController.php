<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnggotaSanksiController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $sanksi = DB::table('sanksi')
            ->join('peminjaman', 'peminjaman.id_peminjaman', '=', 'sanksi.id_peminjaman')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->join('users', 'users.id', '=', 'anggota.id_user')
            ->select('anggota.nama', 'buku.judul', 'sanksi.*')
            ->where('users.id', $id)
            ->get();
        return view('levelAnggota.sanksi.index', compact('sanksi'));
    }

    public function show(string $id): View
    {
        $sanksi = DB::table('sanksi')
            ->join('peminjaman', 'peminjaman.id_peminjaman', '=', 'sanksi.id_peminjaman')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->select('anggota.nama', 'buku.judul', 'sanksi.*')
            ->where('sanksi.id_sanksi', $id)
            ->first();
        return view('levelAnggota.sanksi.detail', compact('sanksi'));
    }
}
