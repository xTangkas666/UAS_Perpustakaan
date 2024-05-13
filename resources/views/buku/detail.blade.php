<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h3>Detail Buku</h3>
            </div>
            <div class="card-body">
                <h3 class="card-title">{{$buku->judul}}</h3>
                <p class="card-text">{{$buku->edisi}}</p>
                <p class="card-text">{{$buku->tahun}}</p>
                <p class="card-text">{{$buku->penerbit}}</p>
                <a href="{{route('buku.index')}}" class="btn btn-primary">Kembali</a>
                <a href="{{route('buku.edit', $buku->no_buku)}}" class="btn btn-info">Edit</a>
            </div>
        </div>
    </div>
</body>