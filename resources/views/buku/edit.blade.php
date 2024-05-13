<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perubahan Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Perubahan Data Buku</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('buku.update', $buku->no_buku) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Buku</label>
                                <input type="number" name="no_buku" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Buku" value="{{ old('no_buku', $buku->no_buku_buku) }}">
                                <small id="emailHelp" class="form-text text-muted">Masukkan Nomor Buku</small>
                                @error('no_buku')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>

                              @method('PUT')
                              <div class="form-group">
                                <label for="exampleInputEmail1">Judul Buku</label>
                                <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Masukkan Judul Buku"  value="{{ old('Judul', $buku->buku_anggota) }}">
                                <small id="idHelp" class="form-text text-muted">Masukkan Judul Buku</small>
                                @error('judul')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Edisi Buku</label>
                                <input type="text" name="edisi" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Edisi Buku" value="{{ old('edisi', $buku->edisi) }}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('edisi')
                                <div class="alert alert-danger mt-2">
                                {{ $message }}
                                </div>
                                @enderror
                                </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Tahun Terbit</label>
                              <input type="number" name="tahun" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tahun Terbit" value="{{ old('tahun', $buku->tahun) }}">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('tahun')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Penerbit" value="{{ old('penerbit', $buku->penerbit) }}">
                                @error('penerbit')
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