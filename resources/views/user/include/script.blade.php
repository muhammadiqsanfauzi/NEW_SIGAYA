<!-- jQuery -->
<script src="{{ asset('assetad/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assetad/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assetad/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assetad/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assetad/plugins/sparklines/sparkline.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assetad/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assetad/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assetad/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assetad/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assetad/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assetad/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('assetad/dist/js/adminlte.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assetad/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- DataTable -->
<script src="{{ asset('assetad/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assetad/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assetad/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- bs-custom-file-input -->
<script src="{{ asset('assetad/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">

    $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });

</script>