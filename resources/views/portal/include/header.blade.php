<!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ url('/') }}">SIGAYA SIAK</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assetslp/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($informasi as $info): ?>
                <li><a href="{{ url('info',[$info->url]) }}">{{ $info->judul }}</a></li>
              <?php endforeach ?>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Cagar Budaya</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($jenis_cb as $jenis): ?>
                <li><a href="{{ url('cagar_budaya',[$jenis->url]) }}">{{ $jenis->jenis_objek }}</a></li>
              <?php endforeach ?>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Peta</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('peta',['cagar_budaya']) }}">Peta Cagara Budaya</a></li>
              <li><a href="{{ url('peta',['pengajuan']) }}">Peta Pengajuan Cagar Budaya</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ url('/') }}#contact">Kontak</a></li>
          {{-- <li><a class="getstarted scrollto" href="#about"class="user-login user-login-check">Admin</a></li> --}}
          <li><a class="getstarted scrollto" {{ request()->is('login') ? 'active' : ''}}" href="{{url('u-login')}}"> <i class="bi bi-people-fill"></i></a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
<!-- End Header