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
            <h2 class="section-title">{{$user->username}}</h2>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{$user->id}}</p>
            <p><strong>Email:</strong> {{$user->email}}</p>
            <p><strong>Level:</strong> {{$user->level}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.user.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection