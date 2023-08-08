<!-- Vendor JS Files -->
<script src="{{ asset('assetslp/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assetslp/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assetslp/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assetslp/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assetslp/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assetslp/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assetslp/vendor/waypoints/noframework.waypoints.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assetslp/js/main.js') }}"></script>

<?php if ($js != ''): ?>
    @include('portal/konten/'.$js)
<?php endif ?>

