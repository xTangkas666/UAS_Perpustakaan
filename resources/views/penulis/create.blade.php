<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tambah Data Penulis</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('penulis.store') }}" method="POST"  >
                          @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">ID Penulis</label>
                            <input type="number" name="id_penulis" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan ID Penulis">
                            <small id="idHelp" class="form-text text-muted"></small>
                            @error('id_penulis')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap Penulis</label>
                            <input type="text" name="nama_penulis" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Nama Lengkap">
                            <small id="idHelp" class="form-text text-muted">Nama Penulis</small>
                            @error('nama_penulis')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Tempat Lahir">
                                <small id="idHelp" class="form-text text-muted"></small>
                                @error('tempat_lahir')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tanggal lahir</label>
                              <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Lahir">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('tgl_lahir')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Email Penulis">
                                <small id="idHelp" class="form-text text-muted">Email</small>
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