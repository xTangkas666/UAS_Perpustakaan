<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="d-flex justify-content-center">Data Anggota</h1>
        
        <div class="d-flex justify-content-start">
        <a href="{{route('anggota.create')}}" class="btn btn-md btn-success mb-3">Tambah Anggota</a>
        </div>

        <div class="container mt-3">        
        <table class="table table-striped">

            <tr>
                <th>No</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggota as $index => $anggota)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $anggota->id_anggota }}</td>
                        <td class="align-middle">{{ $anggota->nama }}</td>
                        <td class="align-middle">{{ $anggota->no_hp }}</td>
                        <td class="align-middle">{{ $anggota->alamat }}</td>
                        <td class="align-middle">{{ $anggota->email }}</td>
                        <td class="align-middle">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('anggota.destroy', $anggota->id_anggota)}}" method='POST'>
                                <a href="{{route('anggota.show', $anggota->id_anggota)}}" class="btn btn-primary">Detail</a>
                                <a href="{{route('anggota.edit', $anggota->id_anggota)}}" class="btn btn-info">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-info">
                        <strong>Data belum ada</strong>
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