<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penulis Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="d-flex justify-content-center">Data Penulis Buku</h1>
        
        <div class="d-flex justify-content-start">
        <a href="{{route('penulis.create')}}" class="btn btn-md btn-success mb-3">Tambah Penulis</a>
        </div>

        <div class="container mt-3">        
        <table class="table table-striped">

            <tr>
                <th>ID Penulis</th>
                <th>Nama Penulis</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penulis as $index => $penulis)
                    <tr>
                        <td class="align-middle">{{ $penulis->id_penulis }}</td>
                        <td class="align-middle">{{ $penulis->nama_penulis }}</td>
                        <td class="align-middle">{{ $penulis->tempat_lahir }}</td>
                        <td class="align-middle">{{ $penulis->tgl_lahir }}</td>    
                        <td class="align-middle">{{ $penulis->email }}</td>
                        <td class="align-middle">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('penulis.destroy', $penulis->id_penulis)}}" method='POST'>
                                <a href="{{route('penulis.show', $penulis->id_penulis)}}" class="btn btn-primary">Detail</a>
                                <a href="{{route('penulis.edit', $penulis->id_penulis)}}" class="btn btn-info">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-info">
                        <strong>Data Penulis belum ada</strong>
                    </div>
            @endforelse
        </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>        