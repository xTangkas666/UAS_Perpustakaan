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
            <h2 class="section-title">Ubah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.penulis.update', $penulis->id_penulis) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama_penulis" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('nama_penulis', $penulis->nama_penulis) }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email</label>
                    <select class="form-control" name="id_user" id="exampleFormControlSelect1" disabled>
                        @foreach ($user as $dt_user)
                        <option value="{{ $dt_user->id_user }}" @if(old('id_user')==$dt_user->id_user)selected
                            @elseif(!old('id_user') && $penulis->id_user == $dt_user->id_user)selected
                            @endif
                            >{{ $dt_user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp" value="{{ old('tempat_lahir', $penulis->tempat_lahir) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp" value="{{ old('tgl_lahir', $penulis->tgl_lahir) }}">
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