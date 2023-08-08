<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php if ($profil->file_foto != Null): ?>
          <img src="{{ asset('image/user/'.$profil->file_foto) }}" class="img-circle elevation-2" alt="User Image">
        <?php else: ?>
          <img src="{{ asset('image/no-image.png') }}" class="img-circle elevation-2" alt="User Image">
        <?php endif ?>
      </div>
      <div class="info">
        <a href="{{ url('u-profil') }}" class="d-block">{{ $user }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ url('u-beranda') }}" class="nav-link <?php if ($judul == 'Beranda') {echo 'active';} ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Beranda</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('u-profil') }}" class="nav-link <?php if ($judul == 'Profil Saya') {echo 'active';} ?>">
          <i class="nav-icon fas fa-user"></i>
            <p>Profil</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('u-read-pengajuan') }}" class="nav-link <?php if ($judul == 'Pengajuam Cagar Budaya') {echo 'active';} ?>">
          <i class="nav-icon fas fa-edit"></i>
            <p>Pengajuan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('u-logout') }}" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>