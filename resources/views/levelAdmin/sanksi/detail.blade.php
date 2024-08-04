@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Sanksi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h2 class="section-title">{{$sanksi->nama}}</h2>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{$sanksi->id_sanksi}}</p>
            <p><strong>Judul Buku:</strong> {{$sanksi->judul}}</p>
            <p><strong>Denda:</strong> {{$sanksi->jumlah_denda}}</p>
            <p><strong>Status:</strong> {{$sanksi->status}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.sanksi.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection