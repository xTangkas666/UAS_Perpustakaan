<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Sanksi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SanksiController extends Controller
{
    public function index(): View
    {
        $sanksi = DB::table('sanksi')
            ->join('peminjaman', 'peminjaman.id_peminjaman', '=', 'sanksi.id_peminjaman')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->select('anggota.nama', 'buku.judul', 'sanksi.*')
            ->get();
        return view('levelAdmin.sanksi.index', compact('sanksi'));
    }

    public function create(): View
    {
        $peminjaman = DB::table('peminjaman')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->where('peminjaman.status', 'Belum')
            ->select('anggota.nama', 'buku.judul', 'id_peminjaman')
            ->get();
        return view('levelAdmin.sanksi.create', compact('peminjaman'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'jumlah_denda' => 'required',
            'status' => 'required',
        ]);

        Sanksi::create([
            'id_peminjaman' => $request->id_peminjaman,
            'jumlah_denda' => $request->jumlah_denda,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.sanksi.index')->with(['success' => 'sanksi Berhasil Ditambahkan']);
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
        return view('levelAdmin.sanksi.detail', compact('sanksi'));
    }

    public function edit(string $id): View
    {
        $sanksi = Sanksi::findOrFail($id);
        $peminjaman = DB::table('peminjaman')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->join('buku', 'buku.no_buku', '=', 'peminjaman.no_buku')
            ->select('anggota.nama', 'buku.judul', 'id_peminjaman')
            ->get();
        return view('levelAdmin.sanksi.edit', compact('sanksi', 'peminjaman'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_peminjaman' => 'required',
            'jumlah_denda' => 'required',
            'status' => 'required',
        ]);

        $sanksi = Sanksi::findOrFail($id);
        $sanksi->update([
            'id_peminjaman' => $request->id_peminjaman,
            'jumlah_denda' => $request->jumlah_denda,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sanksi.index')->with(['success' => 'Data sanksi Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $sanksi = Sanksi::findOrFail($id);
        $sanksi->delete();
        return redirect()->route('admin.sanksi.index')->with(['success' => 'sanksi Berhasil Dihapus!']);
    }
}
