<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class RakController extends Controller
{
    public function index(): View
    {
        $rak = Rak::all();
        return view('levelAdmin.rak.index', compact('rak'));
    }

    public function create(): View
    {
        return view('levelAdmin.rak.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'lokasi' => 'required',
        ]);

        rak::create([
            'lokasi' => $request->lokasi,
        ]);
        return redirect()->route('admin.rak.index')->with(['success' => 'rak Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $rak = Rak::findOrFail($id);
        return view('levelAdmin.rak.detail', compact('rak'));
    }

    public function edit(string $id): View
    {
        $rak = rak::findOrFail($id);
        return view('levelAdmin.rak.edit', compact('rak'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'lokasi' => 'required',
        ]);

        $rak = rak::findOrFail($id);
        $rak->update([
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('admin.rak.index')->with(['success' => 'Data rak Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $rak = rak::findOrFail($id);
        $rak->delete();
        return redirect()->route('admin.rak.index')->with(['success' => 'rak Berhasil Dihapus!']);
    }
}
