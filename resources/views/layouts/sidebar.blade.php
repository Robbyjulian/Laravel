<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="{{'/'}}">
      <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
      <h5 class="logo-text">Dashtreme Admin</h5>
    </a>
  </div>
  <ul class="sidebar-menu">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="zmdi zmdi-layers"></i>
         <span>Konfigurasi</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">
       <li><a href="{{ route('setup')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Setup Aplikasi</a></li>
       </ul>
     </li>
     <li>
      <a href="javaScript:void();" class="waves-effect">
        <i class="ti-user"></i> <span>User</span><i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{ route('dosen.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i> Dosen</a></li>
        <li><a href="{{ route('mahasiswa') }}"><i class="zmdi zmdi-dot-circle-alt"></i> Mahasiswa</a></li>
      <li><a href="{{ route('makul.index')}}"><i class="zmdi zmdi-book"></i> Mata Kuliah</a></li>
      </ul>
    </li>
       
  </div>
  <!--End sidebar-wrapper-->