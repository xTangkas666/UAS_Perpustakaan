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
            <h2 class="section-title">Ubah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.buku.update', $buku->no_buku) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('judul', $buku->judul) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Edisi</label>
                    <input type="text" name="edisi" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('edisi', $buku->edisi) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tahun</label>
                    <input type="date" name="tahun" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('tahun', $buku->tahun) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('penerbit', $buku->penerbit) }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Lokasi</label>
                    <select class="form-control" name="id_rak" id="exampleFormControlSelect1">
                        @foreach ($rak as $dt_rak)
                        <option value="{{ $dt_rak->id_rak }}" @if(old('id_rak')==$dt_rak->id_rak)selected
                            @elseif(!old('id_rak') && $buku->id_rak == $dt_rak->id_rak)selected
                            @endif
                            >{{ $dt_rak->lokasi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Penulis</label>
                    <select class="form-control" name="id_penulis" id="exampleFormControlSelect1">
                        @foreach ($penulis as $dt_penulis)
                        <option value="{{ $dt_penulis->id_penulis }}" @if(old('id_penulis')==$dt_penulis->id_penulis)selected
                            @elseif(!old('id_penulis') && $buku->id_penulis == $dt_penulis->id_penulis)selected
                            @endif
                            >{{ $dt_penulis->nama_penulis }}</option>
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