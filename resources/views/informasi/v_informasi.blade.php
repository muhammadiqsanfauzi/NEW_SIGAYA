@include('headcss_mif')
@include('sidebar_mif')
@include('navbar_mif')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>{{$judul}}</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content --> 
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-3">
            <div class="card-header">
              <a href="javascript:void(0)" onClick="add()" title="Tambah Informasi" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <table id="dt-informasi" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><center>Judul</center></th>
                            <th>Isi</th>
                            <th>Foto</th>
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

@include('informasi.m_informasi')
@include('informasi.js_informasi')

@include('footer_mif')

</body>
</html>