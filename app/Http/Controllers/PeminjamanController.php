<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PeminjamanController extends Controller
{
    public function index(): View
    {
        $peminjaman = DB::table('peminjaman')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->select('buku.judul', 'anggota.nama', 'peminjaman.*')
            ->get();
        return view('levelAdmin.peminjaman.index', compact('peminjaman'));
    }

    public function create(): View
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('levelAdmin.peminjaman.create', compact('buku', 'anggota'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'no_buku' => 'required',
            'id_anggota' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'status' => 'required',
        ]);

        Peminjaman::create([
            'no_buku' => $request->no_buku,
            'id_anggota' => $request->id_anggota,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.peminjaman.index')->with(['success' => 'peminjaman Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $peminjaman = DB::table('peminjaman')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->select('buku.judul', 'anggota.nama', 'peminjaman.*')
            ->where('peminjaman.id_peminjaman', $id)
            ->first();
        return view('levelAdmin.peminjaman.detail', compact('peminjaman'));
    }

    public function edit(string $id): View
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('levelAdmin.peminjaman.edit', compact('peminjaman', 'buku', 'anggota'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'no_buku' => 'required',
            'id_anggota' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'status' => 'required',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'no_buku' => $request->no_buku,
            'id_anggota' => $request->id_anggota,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.peminjaman.index')->with(['success' => 'Data peminjaman Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('admin.peminjaman.index')->with(['success' => 'peminjaman Berhasil Dihapus!']);
    }
}
