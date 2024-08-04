<li class="menu-header">MAIN MENU</li>
<li class="nav-item {{request()->is('admin/user')? 'active' : ''}}">
    <a href="{{url('admin/user')}}"><i class="fas fa-users"></i><span>Pengguna</span></a>
</li>
<li class="nav-item {{request()->is('admin/anggota')? 'active' : ''}}">
    <a href="{{url('admin/anggota')}}"><i class="fas fa-id-badge"></i><span>Anggota</span></a>
</li>
<li class="nav-item {{request()->is('admin/penulis')? 'active' : ''}}">
    <a href="{{url('admin/penulis')}}"><i class="fas fa-feather"></i><span>Penulis</span></a>
</li>
<li class="nav-item {{request()->is('admin/rak')? 'active' : ''}}">
    <a href="{{url('admin/rak')}}"><i class="fas fa-barcode"></i><span>Rak</span></a>
</li>
<li class="nav-item {{request()->is('admin/buku')? 'active' : ''}}">
    <a href="{{url('admin/buku')}}"><i class="fas fa-book"></i><span>Buku</span></a>
</li>
<li class="nav-item {{request()->is('admin/peminjaman')? 'active' : ''}}">
    <a href="{{url('admin/peminjaman')}}"><i class="fas fa-stamp"></i><span>Peminjaman</span></a>
</li>
<li class="nav-item {{request()->is('admin/sanksi')? 'active' : ''}}">
    <a href="{{url('admin/sanksi')}}"><i class="fas fa-file-invoice-dollar"></i><span>Sanksi</span></a>
</li>