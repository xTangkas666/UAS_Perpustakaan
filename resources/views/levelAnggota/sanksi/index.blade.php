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
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Denda</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($sanksi as $index => $dt_sanksi)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$dt_sanksi->nama}}</td>
                        <td>{{$dt_sanksi->judul}}</td>
                        <td>{{$dt_sanksi->jumlah_denda}}</td>
                        <td>{{$dt_sanksi->status}}</td>
                        <td>
                            <a href="{{ route('anggota.sanksi.show', $dt_sanksi->id_sanksi)}}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-info">
                        <strong>Data belum ada</strong>
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection