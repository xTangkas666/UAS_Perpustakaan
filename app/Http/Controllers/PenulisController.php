<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PenulisController extends Controller
{
    public function index(): View
    {
        $penulis = DB::table('penulis')
            ->join('users', 'users.id', '=', 'penulis.id_user')
            ->select('users.email', 'penulis.*')
            ->get();
        return view('levelAdmin.penulis.index', compact('penulis'));
    }

    public function create(): View
    {
        $user = User::where('level', 'Penulis')->get();
        return view('levelAdmin.penulis.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_penulis' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'id_user' => 'required',
        ]);

        penulis::create([
            'nama_penulis' => $request->nama_penulis,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'id_user' => $request->id_user,
        ]);
        return redirect()->route('admin.penulis.index')->with(['success' => 'Penulis Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $penulis = DB::table('penulis')
            ->join('users', 'users.id', '=', 'penulis.id_user')
            ->select('users.email', 'penulis.*')
            ->where('penulis.id_penulis', $id)
            ->first();
        return view('levelAdmin.penulis.detail', compact('penulis'));
    }

    public function edit(string $id): View
    {
        $penulis = Penulis::findOrFail($id);
        $user = User::where('level', 'Penulis')->get();
        return view('levelAdmin.penulis.edit', compact('penulis', 'user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_penulis' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $penulis = Penulis::findOrFail($id);
        $penulis->update([
            'nama_penulis' => $request->nama_penulis,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
        ]);

        return redirect()->route('admin.penulis.index')->with(['success' => 'Data Penulis Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();
        return redirect()->route('admin.penulis.index')->with(['success' => 'Penulis Berhasil Dihapus!']);
    }
}
