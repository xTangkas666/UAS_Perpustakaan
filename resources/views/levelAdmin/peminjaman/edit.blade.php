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
            <h2 class="section-title">Ubah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.peminjaman.update', $peminjaman->id_peminjaman) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama</label>
                    <select class="form-control" name="id_anggota" id="exampleFormControlSelect1">
                        @foreach ($anggota as $dt_anggota)
                        <option value="{{ $dt_anggota->id_anggota }}" @if(old('id_anggota')==$dt_anggota->id_anggota)selected
                            @elseif(!old('id_anggota') && $peminjaman->id_anggota == $dt_anggota->id_anggota)selected
                            @endif
                            >{{ $dt_anggota->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Judul Buku</label>
                    <select class="form-control" name="no_buku" id="exampleFormControlSelect1">
                        @foreach ($buku as $dt_buku)
                        <option value="{{ $dt_buku->no_buku }}" @if(old('no_buku')==$dt_buku->no_buku)selected
                            @elseif(!old('no_buku') && $peminjaman->no_buku == $dt_buku->no_buku)selected
                            @endif
                            >{{ $dt_buku->judul }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Peminjaman</label>
                    <input type="date" name="tgl_peminjaman" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('tgl_peminjaman', $peminjaman->tgl_peminjaman) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                    <input type="date" name="tgl_pengembalian" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('tgl_pengembalian', $peminjaman->tgl_pengembalian) }}">
                </div>
                <div class="form-group">
                    <label for="level" class="form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        @foreach(['Kembali', 'Belum'] as $statusOption)
                        <option value="{{ $statusOption }}" @if(old('status', $peminjaman->status) == $statusOption) selected @endif>
                            {{ $statusOption }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection