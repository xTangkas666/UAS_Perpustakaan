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
            <h2 class="section-title">Ubah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.anggota.update', $anggota->id_anggota) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('nama', $anggota->nama) }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email</label>
                    <select class="form-control" name="id_user" id="exampleFormControlSelect1" disabled>
                        @foreach ($user as $dt_user)
                        <option value="{{ $dt_user->id_user }}" @if(old('id_user')==$dt_user->id_user)selected
                            @elseif(!old('id_user') && $anggota->id_user == $dt_user->id_user)selected
                            @endif
                            >{{ $dt_user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="text" name="no_hp" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp" value="{{ old('no_hp', $anggota->no_hp) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp">{{ old('alamat', $anggota->alamat) }}</textarea>
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