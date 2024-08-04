@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Buku</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h2 class="section-title">{{$buku->judul}}</h2>
        </div>
        <div class="card-body">
            <p><strong>Edisi:</strong> {{$buku->edisi}}</p>
            <p><strong>Tahun:</strong> {{$buku->tahun}}</p>
            <p><strong>Penerbit:</strong> {{$buku->penerbit}}</p>
            <p><strong>Lokasi:</strong> {{$buku->lokasi}}</p>
            <p><strong>Nama Penulis:</strong> {{$buku->nama_penulis}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('anggota.buku.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection