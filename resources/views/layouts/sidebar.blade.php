<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">
        @if (Auth::user()->role === "super-admin")
            Super Admin
        @elseif(Auth::user()->role === "staf")
            Staf HR
        @elseif(Auth::user()->role === "karyawan")
            Karyawan
        @endif
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route("dashboard") }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        @if (Auth::user()->role === "super-admin" || Auth::user()->role === "staf") 
        <li class="menu-header">Karyawan</li>
        <li><a class="nav-link" href="{{ route("karyawan") }}"><i class="fas fa-user"></i> <span>Karyawan</span></a></li>
        <li class="menu-header">Approval</li>
        <li><a class="nav-link" href="{{ route("approval") }}"><i class="far fa-check-circle"></i> <span>Approval</span></a></li>
        <li class="menu-header">Pengajuan Cuti</li>
        <li><a class="nav-link" href="{{ route("pengajuanAll") }}"><i class="far fa-sticky-note"></i> <span>Pengajuan</span></a></li>
        @endif



        @if (Auth::user()->role === "karyawan")
        <li class="menu-header">Pengajuan Cuti</li>
        <li><a class="nav-link" href="{{ route("pengaduan") }}"><i class="far fa-sticky-note"></i> <span>Pengajuan</span></a></li>
        @endif
        
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="{{ route("logout") }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Logout
        </a>
      </div>
  </aside>       
</div>
