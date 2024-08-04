<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Rak;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BukuController extends Controller
{
    public function index(): View
    {
        $buku = DB::table('buku')
            ->join('penulis', 'penulis.id_penulis', '=', 'buku.id_penulis')
            ->join('rak', 'rak.id_rak', '=', 'buku.id_rak')
            ->select('penulis.nama_penulis', 'rak.lokasi', 'buku.*')
            ->get();
        return view('levelAdmin.buku.index', compact('buku'));
    }

    public function create(): View
    {
        $penulis = Penulis::all();
        $rak = Rak::all();
        return view('levelAdmin.buku.create', compact('penulis', 'rak'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required',
            'edisi' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'id_penulis' => 'required',
            'id_rak' => 'required',
        ]);

        buku::create([
            'judul' => $request->judul,
            'edisi' => $request->edisi,
            'tahun' => $request->tahun,
            'penerbit' => $request->penerbit,
            'id_penulis' => $request->id_penulis,
            'id_rak' => $request->id_rak,
        ]);
        return redirect()->route('admin.buku.index')->with(['success' => 'Buku Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $buku = DB::table('buku')
            ->join('penulis', 'penulis.id_penulis', '=', 'buku.id_penulis')
            ->join('rak', 'rak.id_rak', '=', 'buku.id_rak')
            ->select('penulis.nama_penulis', 'rak.lokasi', 'buku.*')
            ->where('buku.no_buku', $id)
            ->first();
        return view('levelAdmin.buku.detail', compact('buku'));
    }

    public function edit(string $id): View
    {
        $buku = Buku::findOrFail($id);
        $penulis = Penulis::all();
        $rak = Rak::all();
        return view('levelAdmin.buku.edit', compact('buku', 'penulis', 'rak'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'judul' => 'required',
            'edisi' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'id_penulis' => 'required',
            'id_rak' => 'required',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul' => $request->judul,
            'edisi' => $request->edisi,
            'tahun' => $request->tahun,
            'penerbit' => $request->penerbit,
            'id_penulis' => $request->id_penulis,
            'id_rak' => $request->id_rak,
        ]);

        return redirect()->route('admin.buku.index')->with(['success' => 'Data Buku Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('admin.buku.index')->with(['success' => 'Buku Berhasil Dihapus!']);
    }
}
