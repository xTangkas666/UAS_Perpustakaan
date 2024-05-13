<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Detail Anggota
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$anggota->nama}}</h5>
                <p class="card-text">{{$anggota->id_anggota}}</p>
                <p class="card-text">{{$anggota->alamat}}</p>
                <p class="card-text">{{$anggota->email}}</p>
                <a href="{{route('anggota.index')}}" class="btn btn-primary">Kembali</a>
                <a href="{{route('anggota.edit', $anggota->id_anggota)}}" class="btn btn-info">Edit</a>
            </div>
        </div>
    </div>
</body>