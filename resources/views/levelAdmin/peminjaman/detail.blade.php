@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Peminjaman</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h2 class="section-title">{{$peminjaman->nama}}</h2>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{$peminjaman->id_peminjaman}}</p>
            <p><strong>Judul Buku:</strong> {{$peminjaman->judul}}</p>
            <p><strong>Tenggat:</strong> {{$peminjaman->tgl_peminjaman}} / {{$peminjaman->tgl_pengembalian}}</p>
            <p><strong>Status:</strong> {{$peminjaman->status}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.peminjaman.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection