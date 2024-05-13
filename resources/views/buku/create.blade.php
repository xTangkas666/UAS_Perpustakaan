<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tambah Data Buku Perpustakaan</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('buku.store') }}" method="POST"  >
                          @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Buku</label>
                            <input type="number" name="no_buku" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Nomor Buku">
                            <small id="idHelp" class="form-text text-muted"></small>
                            @error('no_buku')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Judul Buku</label>
                            <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan judul Buku">
                            <small id="idHelp" class="form-text text-muted">Judul Buku</small>
                            @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Edisi Buku</label>
                                <input type="text" name="edisi" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Edisi Buku">
                                <small id="idHelp" class="form-text text-muted"></small>
                                @error('edisi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tahun Terbit</label>
                              <input type="number" name="tahun" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tahun Terbit">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('tahun')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Penerbit Buku</label>
                                <input type="text" name="penerbit" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Penerbit Buku">
                                <small id="idHelp" class="form-text text-muted">Penerbit Buku</small>
                                @error('penerbit')
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