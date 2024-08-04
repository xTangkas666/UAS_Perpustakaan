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
            <h2 class="section-title">Ubah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.sanksi.update', $sanksi->id_sanksi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Peminjaman</label>
                    <select class="form-control" name="id_peminjaman" id="exampleFormControlSelect1">
                        @foreach ($peminjaman as $dt_peminjaman)
                        <option value="{{ $dt_peminjaman->id_peminjaman }}">{{ $dt_peminjaman->nama }} - {{ $dt_peminjaman->judul }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Denda</label>
                    <input type="number" name="jumlah_denda" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('jumlah_denda', $sanksi->jumlah_denda) }}">
                </div>
                <div class="form-group">
                    <label for="level" class="form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        @foreach(['Tunggakan', 'Lunas'] as $statusOption)
                        <option value="{{ $statusOption }}" @if(old('status', $sanksi->status) == $statusOption) selected @endif>
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