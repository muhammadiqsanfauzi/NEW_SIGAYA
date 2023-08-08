  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          {{-- <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div> --}}
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SICABUD KABUPATEN SIAK</h3>
            <p>
              Dinas Pendidian dan Budaya Kab.Siak<br>
              Jl Panglima Undan No. 2 <br>
              Kelurahan Kampung Rempak <br>
              Kecamatan Siak, Kabupaten Siak, Riau<br><br>

              <strong>Phone:</strong>0853 8877 0x98<br>
              <strong>Email:</strong> adminsicabud@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link Terkait</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a target="blank" href="http://cagarbudaya.kemdikbud.go.id">Cagar Budaya Tingkat Nasional</a></li>
              <li><i class="bx bx-chevron-right"></i> <a target="blank" href="https://disdikbud.siakkab.go.id">Website Dinas Pendidikan dan Budaya</a></li>
              <li><i class="bx bx-chevron-right"></i> <a target="blank" href="https://siakkab.go.id">Portal Kabupaten Siak</a></li>
              <li><i class="bx bx-chevron-right"></i> <a target="blank" href="https://diskominfo.siakkab.go.id">Dinas Komunikasi dan Informatika Kab.Siak</a></li>
              <li><i class="bx bx-chevron-right"></i> <a target="blank" href="https://e-pusda.siakkab.go.id/">E-Pusda Siak</a></li>
              <li><i class="bx bx-chevron-right"></i> <a target="blank" href="https://silau.siakkab.go.id/">Siak Badelau</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Cagar Budaya</h4>
            <ul>
              <?php foreach ($jenis_cb as $value): ?>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ url('cagar_budaya',[$value->url]) }}">{{ $value->jenis_objek }}</a></li>
              <?php endforeach ?>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Social Networks</h4>
            <p>Silahkan kunjungi sosial netword kami untuk melihat informasi lain tentang Cagar Budaya Kabupaten Siak</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Dibuat Oleh : <strong><span>DINAS KOMINFO KABUPATEN SIAK. </span></strong>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
          <a href="http://diskominfo.siakkab.go.id/">@diskominfosiak</a>
        </div>
      </div>
  </footer><!-- End Footer -->