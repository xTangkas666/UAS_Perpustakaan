<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class BukuController extends Controller
{
    public function index(): View {
        $buku = Buku::latest()->paginate(10);
        return view('buku.index',compact('buku'));
     }

    public function create(): View {
        return view('buku.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
                'no_buku'=> 'required|unique:buku,no_buku',
                'judul' => 'required',
                'edisi' => 'required',
                'tahun' => 'required',
                'penerbit' => 'required',
            ]);

    buku::create([
        'no_buku' => $request->no_buku,
        'judul' => $request->judul,
        'edisi' => $request->edisi,
        'tahun' => $request->tahun,
        'penerbit' => $request->penerbit,
    ]);
    return redirect()->route('buku.index')->with(['success' => 'Buku Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
    $buku = Buku::findOrFail($id);

    return view('buku.detail', compact('buku'));
    }

    public function edit(string $id): View
    {
    $buku = Buku::findOrFail($id);

    return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
    //validate form
    $request->validate([
        'no_buku'=> 'required|unique:buku,no_buku',
        'judul' => 'required',
        'edisi' => 'required',
        'tahun' => 'required',
        'penerbit' => 'required',
    ]);

    $buku = Buku::findOrFail($id);
    $buku->update([
        'no_buku' => $request->no_buku,
        'judul' => $request->judul,
        'edisi' => $request->edisi,
        'tahun' => $request->tahun,
        'penerbit' => $request->penerbit,
        ]);

    return redirect()->route('buku.index')->with(['success' => 'Data Buku Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
    $buku = Buku::findOrFail($id);
    $buku->delete();
    return redirect()->route('buku.index')->with(['success' => 'Buku Berhasil Dihapus!']);
    }


}