<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="d-flex justify-content-center">Data Buku Perpustakaan</h1>
        
        <div class="d-flex justify-content-start">
        <a href="{{route('buku.create')}}" class="btn btn-md btn-success mb-3">Tambah Buku</a>
        </div>

        <div class="container mt-3">        
        <table class="table table-striped">

            <tr>
                <th>No Buku</th>
                <th>Judul</th>
                <th>Edisi</th>
                <th>Tahun</th>
                <th>Penerbit</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($buku as $index => $buku)
                    <tr>
                        <td class="align-middle">{{ $buku->no_buku }}</td>
                        <td class="align-middle">{{ $buku->judul }}</td>
                        <td class="align-middle">{{ $buku->edisi }}</td>
                        <td class="align-middle">{{ $buku->tahun }}</td>    
                        <td class="align-middle">{{ $buku->penerbit }}</td>
                        <td class="align-middle">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('buku.destroy', $buku->no_buku)}}" method='POST'>
                                <a href="{{route('buku.show', $buku->no_buku)}}" class="btn btn-primary">Detail</a>
                                <a href="{{route('buku.edit', $buku->no_buku)}}" class="btn btn-info">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-info">
                        <strong>Data Buku belum ada</strong>
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