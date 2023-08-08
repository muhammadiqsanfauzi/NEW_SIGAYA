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

            <div class="card-header">
              <h3 class="card-title">Daftar User</h3>
            </div>

            <div class="card-body">
              <table id="dt-user" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Foto</th>
                          <th><center>Nama - Email</center></th>
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

@include('daftar_user.js_daftar_user')

@include('footer_mif')

</body>
</html>




