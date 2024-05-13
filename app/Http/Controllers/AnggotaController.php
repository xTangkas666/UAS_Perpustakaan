<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AnggotaController extends Controller
{
    public function index(): View {
        $anggota = Anggota::latest()->paginate(10);
        return view('anggota.index',compact('anggota'));
     }

    public function create(): View {
        return view('anggota.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([

        'id_anggota'=> 'required|unique:anggota,id_anggota',
        'nama' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'email' => 'required'

    ]);

    anggota::create([
        'id_anggota' => $request->id_anggota,
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'email' => $request->email,
    ]);
    return redirect()->route('anggota.index')->with(['success' => 'Anggota Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
    $anggota = Anggota::findOrFail($id);

    return view('anggota.detail', compact('anggota'));
    }

    public function edit(string $id): View
    {
    $anggota = Anggota::findOrFail($id);

    return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
    //validate form
    $request->validate([
        'id_anggota'=> 'required|unique:anggota,id_anggota',
        'nama' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'email' => 'required'
    ]);

    $anggota = Anggota::findOrFail($id);
    $anggota->update([
        'id_anggota' => $request->id_anggota,
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'email' => $request->email,
        ]);

    return redirect()->route('anggota.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
    $anggota = Anggota::findOrFail($id);
    $anggota->delete();
    return redirect()->route('anggota.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}