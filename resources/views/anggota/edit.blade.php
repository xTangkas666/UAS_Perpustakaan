<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perubahan Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Perubahan Data Anggota</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Anggota</label>
                                <input type="number" name="id_anggota" class="form-control" id="exampleInputEmail1" placeholder="Enter ID" value="{{ old('id_anggota', $anggota->id_anggota) }}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('id_anggota')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>

                              @method('PUT')
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Nama Lengkap"  value="{{ old('nama', $anggota->nama_anggota) }}">
                                <small id="idHelp" class="form-text text-muted">Masukkan Nama Lengkap</small>
                                @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor HP</label>
                                <input type="number" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="Enter ID" value="{{ old('no_hp', $anggota->no_hp) }}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                {{ $message }}
                                </div>
                                @enderror
                                </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Alamat Lengkap</label>
                              <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat Lengkap" value="{{ old('alamat', $anggota->alamat) }}">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('alamat')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email', $anggota->email) }}">
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