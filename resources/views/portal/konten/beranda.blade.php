@extends('portal.template')

@include('portal.include.slider')

<main id="main">

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Cagar Budaya</h2>
      </div>

      <div class="row">

        <div class="col-xl col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <center><div class="icon"><i class='bx bxs-trophy'></i></div></center>
            <center><h4><a href="{{ url('') }}">Benda</a></h4></center>
          </div>
        </div>

        <div class="col-xl col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <center><div class="icon"><i class='bx bxs-business'></i></div></center>
            <center><h4><a href="">Bangunan</a></h4></center>
          </div>
        </div>

        <div class="col-xl col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <center><div class="icon"><i class='bx bxs-arch'></i></div></center>
            <center><h4><a href="">Struktur</a></h4></center>
          </div>
        </div>

        <div class="col-xl col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <center><div class="icon"><i class='bx bxs-bank'></i></div></center>
            <center><h4><a href="">Situs</a></h4></center>
          </div>
        </div>

        <div class="col-xl col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <center><div class="icon"><i class='bx bx-map-alt'></i></div></center>
            <center><h4><a href="">Kawasan</a></h4></center>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>5 Objek Terverifikasi Terakhir</h2>
      </div>

      <div class="row d-flex justify-content-center">
        <?php use App\Models\FilePengajuanModel; ?>

        <?php foreach ($cagar_budaya as $cagar_budaya): ?>

          <div class="col-lg-6 mb-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{ asset('image/cagar_budaya/'.$cagar_budaya->foto) }}" class="img-fluid rounded" alt=""></div>
              <div class="member-info">
                <h4>{{ $cagar_budaya->nama_objek }}</h4>
                <span>{{ $cagar_budaya->jenis_objek }}</span>
                <p><?= substr($cagar_budaya->keterangan,0,90).'...' ?></p>
                <a href="{{ url($cagar_budaya->url_objek) }}" title="" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
              </div>
            </div>
          </div>

        <?php endforeach ?>

      </div>

    </div>
  </section>

  <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
          <p>Jika Ada Pertanyaan Seputar Informasi tentang Cagar Budaya di kabupaten Siak, Silahkan hubungi kontak kami.</p>
        </div>

        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Dinas Pendidikan dan Budaya, Kabupaten Siak</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>sicabud@siakkab.go.id</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Hp:</h4>
                <p>0853 7788 xxxx</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1677.3414607226275!2d102.02401756958307!3d0.8169053401530726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d42129c81ed8ff%3A0x46a88094cd95a45c!2sDinas%20Pendidikan%20Dan%20Kebudayaan!5e0!3m2!1sen!2sid!4v1637654004661!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

</main>
<!-- End #main -->