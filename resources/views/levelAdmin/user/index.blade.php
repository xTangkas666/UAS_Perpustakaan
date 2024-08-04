@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>User</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.user.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($user as $index => $dt_user)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$dt_user->username}}</td>
                        <td>{{$dt_user->email}}</td>
                        <td>{{$dt_user->level}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.user.destroy', $dt_user->id) }}" method="POST">
                                <a href="{{ route('admin.user.show', $dt_user->id)}}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('admin.user.edit', $dt_user->id) }}" class="btn btn-info">Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
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
    </div>
</div>
@endsection