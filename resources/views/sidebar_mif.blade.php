<!-- <!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini"> -->
  <div class="wrapper">

   

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
          </div>
          <div class="info">
            <a href="#" class="d-block">SICABUD</a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-5">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                {{-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inactive Page</p>
                  </a>
                </li> --}}
                <li class="{{ request()->is('jenis_objek') ? 'active' : ''}}">
                  <a href="{{url('jenis_objek')}}" class="nav-link">  
                      <i class="nav-icon fas fa-home"></i>
                      <p>Jenis Objek</p>
                  </a>
                </li>

                 <li class="{{ request()->is('cagar_budaya') ? 'active' : ''}}">
                  <a href="{{url('cagar_budaya')}}" class="nav-link">  
                      <i class="nav-icon fas fa-clone"></i>
                      <p>Cagar Budaya</p>
                  </a>
                </li>

                

              </ul>
            </li>

            <li class="nav-item {{ request()->is('daftar_user') ? 'active' : ''}}">
              <a href="{{url('daftar_user')}}" class="nav-link">  
                <i class="nav-icon fas fa-user"></i>
                <p>Daftar User</p>
              </a>
            </li>

            <li class="nav-item {{ request()->is('daftar_pengajuan') ? 'active' : ''}}">
              <a href="{{url('daftar_pengajuan')}}" class="nav-link">  
                <i class="nav-icon fas fa-file-download"></i>
                <p>Daftar Pengajuan</p>
              </a>
            </li>

            <li class="nav-item {{ request()->is('read_informasi') ? 'active' : ''}}">
              <a href="{{url('read_informasi')}}" class="nav-link">  
                <i class="nav-icon fas fa-info-circle"></i>
                <p>Daftar Informasi</p>
              </a>
            </li>

            <li class="nav-item {{ request()->is('read_kontak') ? 'active' : ''}}">
              <a href="{{url('read_kontak')}}" class="nav-link">  
                <i class="nav-icon fas fa-phone"></i>
                <p>Kontak</p>
              </a>
            </li>


            <li class="{{ request()->is('logout') ? 'active' : ''}}>
              <a href="#" class="nav-link">
              <a href="{{url('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  KELUAR
                </p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Simple Link
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li> --}}
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

 

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

  <!-- ./wrapper -->
<!-- </body>
</html> -->