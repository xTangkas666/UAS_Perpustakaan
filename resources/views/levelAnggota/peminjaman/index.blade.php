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
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam dan Kembali</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($peminjaman as $index => $dt_peminjaman)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$dt_peminjaman->nama}}</td>
                        <td>{{$dt_peminjaman->judul}}</td>
                        <td>{{$dt_peminjaman->tgl_peminjaman}} / {{$dt_peminjaman->tgl_pengembalian}}</td>
                        <td>{{$dt_peminjaman->status}}</td>
                        <td>
                            <a href="{{ route('anggota.peminjaman.show', $dt_peminjaman->id_peminjaman)}}" class="btn btn-primary">Detail</a>
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