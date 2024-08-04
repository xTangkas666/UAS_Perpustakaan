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
            <a href="{{ route('admin.penulis.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($penulis as $index => $dt_penulis)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$dt_penulis->nama_penulis}}</td>
                        <td>{{$dt_penulis->tempat_lahir}}</td>
                        <td>{{$dt_penulis->tgl_lahir}}</td>
                        <td>{{$dt_penulis->email}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.penulis.destroy', $dt_penulis->id_penulis) }}" method="POST">
                                <a href="{{ route('admin.penulis.show', $dt_penulis->id_penulis)}}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('admin.penulis.edit', $dt_penulis->id_penulis) }}" class="btn btn-info">Ubah</a>
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