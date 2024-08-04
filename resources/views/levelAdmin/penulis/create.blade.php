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
        <h2 class="section-title">Tambah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.penulis.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama_penulis" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter Name">
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
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp" placeholder="Enter Birthplace">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp" placeholder="Enter Birthdate">
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