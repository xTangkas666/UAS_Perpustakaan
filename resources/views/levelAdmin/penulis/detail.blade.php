@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Penulis</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h2 class="section-title">{{$penulis->nama_penulis}}</h2>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{$penulis->id_penulis}}</p>
            <p><strong>Email:</strong> {{$penulis->email}}</p>
            <p><strong>Tempat Lahir:</strong> {{$penulis->tempat_lahir}}</p>
            <p><strong>Tanggal Lahir:</strong> {{$penulis->tgl_lahir}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.penulis.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection