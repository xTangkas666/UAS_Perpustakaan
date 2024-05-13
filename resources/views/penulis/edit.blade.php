<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perubahan Data Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Perubahan Data Penulis</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('penulis.update', $penulis->id_penulis) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Penulis</label>
                                <input type="number" name="id_penulis" class="form-control" id="exampleInputEmail1" placeholder="Masukkan ID Penulis" value="{{ old('id_penulis', $penulis->id_penulis) }}">
                                <small id="emailHelp" class="form-text text-muted">Masukkan ID Penulis</small>
                                @error('id_penulis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>

                              @method('PUT')
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap Penulis</label>
                                <input type="text" name="nama_penulis" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Nama Lengkap"  value="{{ old('nama_penulis', $penulis->nama_penulis_penulis) }}">
                                <small id="idHelp" class="form-text text-muted">Masukkan Nama Penulis</small>
                                @error('nama_penulis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir', $penulis->tempat_lahir_penulis) }}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('tempat_lahir')
                                <div class="alert alert-danger mt-2">
                                {{ $message }}
                                </div>
                                @enderror
                                </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Tanggal Lahir</label>
                              <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Lahir" value="{{ old('tgl_lahir', $penulis->tgl_lahir_penulis) }}">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('tgl_lahir')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email" value="{{ old('email', $penulis->email) }}">
                                @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            
                              <br/>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>