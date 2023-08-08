@extends('portal.template')

@include('portal.include.slider')

<main id="main">

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container mb-5" data-aos="fade-up">

      <div class="section-title">
        <h2>{{ $informasi_detail->judul }}</h2>
      </div>

      <div class="portfolio-item">
        <img src="{{ asset('image/informasi/'.$informasi_detail->file) }}" class="w-100 img-fluid rounded">
        <div class="row mt-3">
            <p>{{ $informasi_detail->isi }}</p>
        </div>
      </div>

    </div>
  </section>
  <!-- End Portfolio Section -->


</main>
<!-- End #main -->