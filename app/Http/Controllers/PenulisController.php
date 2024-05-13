<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class PenulisController extends Controller
{
    public function index(): View {
        $penulis = Penulis::latest()->paginate(10);
        return view('penulis.index',compact('penulis'));
     }

    public function create(): View {
        return view('penulis.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
                'id_penulis'=> 'required|unique:penulis,id_penulis',
                'nama_penulis'=> 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'email' => 'required',
            ]);

    penulis::create([
        'id_penulis' => $request->id_penulis,
        'nama_penulis' => $request->nama_penulis,
        'tempat_lahir' => $request->tempat_lahir,
        'tgl_lahir' => $request->tgl_lahir,
        'email' => $request->email,
        ]);
    return redirect()->route('penulis.index')->with(['success' => 'Penulis Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
    $penulis = Penulis::findOrFail($id);

    return view('penulis.detail', compact('penulis'));
    }

    public function edit(string $id): View
    {
    $penulis = Penulis::findOrFail($id);

    return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
    //validate form
    $request->validate([
        'id_penulis'=> 'required|unique:penulis,id_penulis',
        'nama_penulis'=> 'required',
        'tempat_lahir' => 'required',
        'tgl_lahir' => 'required',
        'email' => 'required',
        ]);

    $penulis = Penulis::findOrFail($id);
    $penulis->update([
        'id_penulis' => $request->id_penulis,
        'nama_penulis' => $request->nama_penulis,
        'tempat_lahir' => $request->tempat_lahir,
        'tgl_lahir' => $request->tgl_lahir,
        'email' => $request->email,
        ]);

    return redirect()->route('penulis.index')->with(['success' => 'Data Penulis Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
    $penulis = Penulis::findOrFail($id);
    $penulis->delete();
    return redirect()->route('penulis.index')->with(['success' => 'Penulis Berhasil Dihapus!']);
    }


}