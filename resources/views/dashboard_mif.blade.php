@include('headcss_mif')
@include('sidebar_mif')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Sicabud Siak</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <h3>{{count($jenis_objek)}}<sup style="font-size: 20px"></sup></h3>
            

                <p>Jumlah Jenis Objek Tercatat</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('jenis_objek')}}" class="small-box-footer">Lihat Disini  <i class="fa fa-eye"></i></a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            
              <div class="inner">
              <h3>{{count($cagar_budaya)}}<sup style="font-size: 20px"></sup></h3>
            

                <p>Jumlah Cagar Budaya Tercatat</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('cagar_budaya')}}" class="small-box-footer">Lihat Disini  <i class="fa fa-eye"></i></a>
              <!-- <a href="https://harians.com/foto/post/16107070350.jpeg" class="portfolio-zoom"><i class="fa fa-eye"></i></a> -->
            </div>
          </div>

            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            
              <div class="inner">
              <h3>{{count($daftar_pengajuan)}}<sup style="font-size: 20px"></sup></h3>
            

                <p>Jumlah Pengajuan Tercatat</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('daftar_pengajuan')}}" class="small-box-footer">Lihat Disini  <i class="fa fa-eye"></i></a>
              <!-- <a href="https://harians.com/foto/post/16107070350.jpeg" class="portfolio-zoom"><i class="fa fa-eye"></i></a> -->
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
            
              <div class="inner">
              <h3>{{count($daftar_user)}}<sup style="font-size: 20px"></sup></h3>
            

                <p>Jumlah User </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('daftar_user')}}" class="small-box-footer">Lihat Disini  <i class="fa fa-eye"></i></a>
              <!-- <a href="https://harians.com/foto/post/16107070350.jpeg" class="portfolio-zoom"><i class="fa fa-eye"></i></a> -->
            </div>
          </div>



          
        </div>
        <!-- /.row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
 
 @include('footer_mif')
