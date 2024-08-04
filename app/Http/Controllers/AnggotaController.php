<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AnggotaController extends Controller
{
    public function index(): View
    {
        $anggota = DB::table('anggota')
        ->join('users', 'users.id', '=', 'anggota.id_user')
        ->select('users.email', 'anggota.*')
        ->get();
        return view('levelAdmin.anggota.index', compact('anggota'));
    }

    public function create(): View
    {
        $user = User::where('level', 'Anggota')->get();
        return view('levelAdmin.anggota.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'id_user' => 'required'

        ]);

        anggota::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'id_user' => $request->id_user,
        ]);
        return redirect()->route('admin.anggota.index')->with(['success' => 'Anggota Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $anggota = DB::table('anggota')
        ->join('users', 'users.id', '=', 'anggota.id_user')
        ->select('users.email', 'anggota.*')
        ->where('anggota.id_anggota', $id)
        ->first();
        return view('levelAdmin.anggota.detail', compact('anggota'));
    }

    public function edit(string $id): View
    {
        $anggota = Anggota::findOrFail($id);
        $user = User::where('level', 'Anggota')->get();
        return view('levelAdmin.anggota.edit', compact('anggota', 'user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.anggota.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('admin.anggota.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
