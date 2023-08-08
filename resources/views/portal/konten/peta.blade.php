@extends('portal.template')

@include('portal.include.slider')

<main id="main">
  <section class="section-bg">
    <div class="container">

      <div class="section-title">
        <h2>{{ $judul }}</h2>
      </div>
      
      <div class="row m-0 p-3 d-flex justify-content-end alert-success">
        <div class="col-lg-3">
          <div class="form-group">
              <select name="kategori" id="kategori" class="form-control form-control-sm">
                <option value="">Semua</option>
                <?php foreach ($jenis_cb as $jenis): ?>
                  <option value="{{ $jenis->id }}">{{ $jenis->jenis_objek}}</option>
                <?php endforeach ?>
              </select>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div id="googleMap" style="width:100%;height:600px;"></div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->

