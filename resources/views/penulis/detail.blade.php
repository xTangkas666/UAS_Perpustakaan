<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h3>Profil Penulis</h3>
            </div>
            <div class="card-body">
                <h3 class="card-title">{{$penulis->nama_penulis}}</h3>
                <p class="card-text">{{$penulis->id_penulis}}</p>
                <p class="card-text">{{$penulis->tempat_lahir}}</p>
                <p class="card-text">{{$penulis->tgl_lahir}}</p>
                <p class="card-text">{{$penulis->email}}</p>
                <a href="{{route('penulis.index')}}" class="btn btn-primary">Kembali</a>
                <a href="{{route('penulis.edit', $penulis->id_penulis)}}" class="btn btn-info">Edit</a>
            </div>
        </div>
    </div>
</body>