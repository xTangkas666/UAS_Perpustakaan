<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tambah Data Anggota</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('anggota.store') }}" method="POST"  >
                          @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">ID Anggota</label>
                            <input type="number" name="id_anggota" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan ID">
                            <small id="idHelp" class="form-text text-muted"></small>
                            @error('id_anggota')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Nama Lengkap">
                            <small id="idHelp" class="form-text text-muted">Nama Lengkap</small>
                            @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor HP</label>
                                <input type="number" name="no_hp" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Nomor HP">
                                <small id="idHelp" class="form-text text-muted"></small>
                                @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Alamat Lengkap</label>
                              <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Alamat Lengkap">
                              <small id="idHelp" class="form-text text-muted">Alamat Lengkap</small>
                              @error('alamat')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('email')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                              <br/>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>