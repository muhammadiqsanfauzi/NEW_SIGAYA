@extends('portal.template')

@include('portal.include.slider')

<main id="main">

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container mb-5" data-aos="fade-up">

      <div class="section-title">
        <h2>{{ $cagar_budaya->nama_objek }}</h2>
      </div>

      <div class="portfolio-item">
        <!-- <div class="portfolio-img rounded shadow"><a href="#" title=""><img src="{{ asset('image/cagar_budaya/') }}" class="img-fluid" alt=""></a></div> -->
        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('image/cagar_budaya/'.$cagar_budaya->foto) }}" alt="" class="w-100 img-fluid rounded">  
          </div>
          <div class="col-md-6">
            <table class="table table-striped table-responsive border">
              <tr>
                <td>ID Objek</td>
                <td>{{ $cagar_budaya->id_objek }}</td>
              </tr>
              <tr>
                <td>Jenis Cagar Budaya</td>
                <td>{{ $cagar_budaya->jenis_objek }}</td>
              </tr>
              <tr>
                <td>Nama Cagar Budaya</td>
                <td>{{ $cagar_budaya->nama_objek }}</td>
              </tr>
              <tr>
                <td>Keberadaan</td>
                <td>{{ $cagar_budaya->kode_alamat }}</td>
              </tr>
            </table>
          </div>
        </div>
        
        <div class="row mt-5">
          <div class="col-md-2">
            Keterangan
          </div>
          <div class="col-md-10">
            <p><i>{{ $cagar_budaya->keterangan }}</i></p>
          </div>
        </div>
        
        <div class="row mt-5">
          <div class="d-flex justify-content-center">
            <div class="rounded" id="googleMap" style="width:100%;height:500px;"></div>
          </div>
        </div>

        <input type="hidden" id="lng" value="{{ $cagar_budaya->longitude }}">
        <input type="hidden" id="lat" value="{{ $cagar_budaya->latitude }}">

      </div>

    </div>
  </section><!-- End Portfolio Section -->


</main>
<!-- End #main -->


<!-- jQuery -->
<script src="{{ asset('assetad/plugins/jquery/jquery.min.js') }}"></script>
<!-- maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDas45XqaLmyBoLtLlxHQ3R5oLLYirbdXs&callback=loadMap&libraries=geometry"></script>

<script>
  let lat = document.getElementById("lat").value;
  let long = document.getElementById("lng").value;

function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(long, lat),
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng(long, lat),
      map: peta
  });

}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>


