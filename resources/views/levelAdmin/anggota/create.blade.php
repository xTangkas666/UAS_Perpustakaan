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
        <h2 class="section-title">Tambah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.anggota.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email</label>
                    <select class="form-control" name="id_user" id="exampleFormControlSelect1">
                      @foreach ($user as $dt_user)
                      <option value="{{ $dt_user->id }}">{{ $dt_user->email }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="text" name="no_hp" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp" placeholder="Enter Address"></textarea>
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