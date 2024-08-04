@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Anggota</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h2 class="section-title">{{$anggota->nama}}</h2>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{$anggota->id_anggota}}</p>
            <p><strong>Email:</strong> {{$anggota->email}}</p>
            <p><strong>Alamat:</strong> {{$anggota->alamat}}</p>
            <p><strong>Telepon:</strong> {{$anggota->no_hp}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.anggota.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection