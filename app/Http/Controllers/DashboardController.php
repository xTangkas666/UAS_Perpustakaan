<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function adminDashboard(): View
    {
        if (auth()->user()->level != 'Admin') {
            abort(404);
        }
        return view('levelAdmin.dashboard');
    }

    public function penulisDashboard(): View
    {
        if (auth()->user()->level != 'Penulis') {
            abort(404);
        }
        return view('levelPenulis.dashboard');
    }

    public function anggotaDashboard(): View
    {
        if (auth()->user()->level != 'Anggota') {
            abort(404);
        }
        return view('levelAnggota.dashboard');
    }
}
