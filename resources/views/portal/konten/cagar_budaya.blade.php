@extends('portal.template')

@include('portal.include.slider')

<main id="main">

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>{{ $judul }}</h2>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

      	<?php if (count($cagar_budaya) == 0): ?>

      		<div class="alert-warning p-4 rounded portfolio-item">
      			<b>{{$judul}}</b> tidak ditemukan !
      		</div>

      	<?php else: ?>

          <?php foreach ($cagar_budaya as $cb): ?>

            <?php  if ($cb->url_objek != Null) { $url = $cb->url_objek; } else { $url = '#'; } ?>


            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img rounded shadow"><a href="{{ url($url) }}" title=""><img src="{{ asset('image/cagar_budaya/'.$cb->foto) }}" class="img-fluid w-100 shadow" alt=""></a></div>
              <div class="p-2">
                <div class="d-flex justify-content-center">
                  <h6><a href="{{ url($cb->url_objek) }}" title="">{{ $cb->nama_objek }}</a></h6><br>
                </div>
                <small class="text-justify">{{ substr($cb->keterangan,0,150) }}...</small>
              </div>
            </div>

           
          <?php endforeach ?>

      	<?php endif ?>

      </div>

    </div>
  </section><!-- End Portfolio Section -->


</main>
<!-- End #main -->