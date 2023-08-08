@include('headcss_mif')
@include('sidebar_mif')
@include('navbar_mif')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content --> 
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-3">

            <div class="card-body">
                <table id="dt-pengajuan" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><center>Nama Objek - Jenis - Lokasi</center></th>
                            <th>Infromasi lain</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
</section>
</div>

@include('daftar_pengajuan.js_daftar_pengajuan')

@include('footer_mif')

</body>
</html>