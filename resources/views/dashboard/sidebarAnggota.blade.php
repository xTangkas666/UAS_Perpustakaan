<li class="menu-header">MAIN MENU</li>
<li class="nav-item {{request()->is('anggota/buku')? 'active' : ''}}">
    <a href="{{url('anggota/buku')}}"><i class="fas fa-book"></i><span>Buku</span></a>
</li>
<li class="nav-item {{request()->is('anggota/peminjaman')? 'active' : ''}}">
    <a href="{{url('anggota/peminjaman')}}"><i class="fas fa-stamp"></i><span>Peminjaman</span></a>
</li>
<li class="nav-item {{request()->is('anggota/sanksi')? 'active' : ''}}">
    <a href="{{url('anggota/sanksi')}}"><i class="fas fa-file-invoice-dollar"></i><span>Sanksi</span></a>
</li>