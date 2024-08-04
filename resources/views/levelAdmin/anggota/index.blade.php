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
            <a href="{{ route('admin.anggota.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($anggota as $index => $dt_anggota)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$dt_anggota->nama}}</td>
                        <td>{{$dt_anggota->no_hp}}</td>
                        <td>{{$dt_anggota->alamat}}</td>
                        <td>{{$dt_anggota->email}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.anggota.destroy', $dt_anggota->id_anggota) }}" method="POST">
                                <a href="{{ route('admin.anggota.show', $dt_anggota->id_anggota)}}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('admin.anggota.edit', $dt_anggota->id_anggota) }}" class="btn btn-info">Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
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