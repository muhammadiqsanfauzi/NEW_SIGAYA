@include('headcss_mif')
@include('sidebar_mif')
@include('navbar_mif')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Cagar Budaya</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="{{route('cagar_budaya.create') }}"><i class=" fa fa-plus "></i> Tambah Cagar Budaya</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Cagar Budaya</h3>
                <div class="col-xs-12 col-sm-12 col-md-20 text-right">
                
            </div>

              </div>

              <div class="card-body">
                <table id="data-table"  class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>ID CAGAR BUDAYA</th>
                  <th>NAMA CAGAR BUDAYA</th>
                  <th>URL</th>
                  <th>JENIS CAGAR BUDAYA</th>
                  <th>KODE ALAMAT</th>
                  <th>LONGITUDE</th>
                  <th>LATITUDE</th>
                  <th>KETERANGAN </th>
                  <th>FOTO</th>
                  <th>FILE SK</th>
                  <th>PILIHAN</th>
                  </tr>
                  </thead>
                  <tbody> 
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                  <th>ID CAGAR BUDAYA</th>
                  <th>NAMA CAGAR BUDAYA</th>
                  <th>URL</th>
                  <th>JENIS CAGAR BUDAYA</th>
                  <th>KODE ALAMAT</th>
                  <th>LONGITUDE</th>
                  <th>LATITUDE</th>
                  <th>KETERANGAN </th>
                  <th>FOTO</th>
                  <th>FILE SK</th>
                  <th>PILIHAN</th>
                  </tr>
                  </tfoot>
                  
                  </thead>
                  <tbody>
                 
                  </tbody>

                </table>
              </div>
            </div>
           
          </div>
  
        </div>
 
      </div>
    </section>
  </div>





<!-- FORM MODAL TAMBAH CAGAR BUDAYA  --> 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">  
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Cagar Budaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
    @endforeach 

      <div class="card-body">
        <form enctype="multipart/form-data" action="{{ route('cagar_budaya.store') }}" method="POST"> 
        @csrf
        <!-- @method('post') -->
          <div class="form-group">
            <label for="nama_objek">Nama Cagar Budaya</label>
            <input type="text" name="nama_objek" class="form-control"@error('nama_objek') is-invalid @enderror" value="{{ old('nama_objek') }}" autofocus>
            @error('nama_objek')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
                <label>Jenis Objek</label>
                <select name="jenis_objek_id" id="jenis_objek" class="form-control">
                  <option value="" >- Pilih Jenis Objek- </option>
                  @foreach ($jenis_objek as $item)
                    <option value="{{ $item->id }}">{{ $item->jenis_objek }}</option>
                  @endforeach
                </select>
          </div>

          <div class="form-group">
            <label for="id_objek">ID Cagar Budaya</label>
            <input type="text" name="id_objek" class="form-control"@error('id_objek') is-invalid @enderror" value="{{ old('id_objek') }}" autofocus>
            @error('id_objek')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

           <div class="form-group">
            <label for="kode_alamat">Kode Alamat</label>
            <input type="text" name="kode_alamat" class="form-control"@error('kode_alamat') is-invalid @enderror" value="{{ old('kode_alamat') }}" autofocus>
            @error('kode_alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

           <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" class="form-control"@error('longitude') is-invalid @enderror" value="{{ old('longitude') }}" autofocus>
            @error('longitude')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" class="form-control"@error('latitude') is-invalid @enderror" value="{{ old('latitude') }}" autofocus>
            @error('latitude')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

           <div class="form-group">
            <label for="keterangan">Keterangan</label>
            
            <input type="text" name="keterangan" class="form-control"@error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" autofocus>
            @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          

          <div class="form-group">
                <label class="">Foto<font color="">@</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="gambar" placeholder="Masukkan foto">
                    <small id="foto_error" class="form-text text-red"></small>
                </div>
          </div>     

         

          <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}" >
              <div class="form-group">
                <label class="">File SK<font color="">@PDF</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="foto" name="file" placeholder="Masukkan File">
                    @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <small id="file_error" class="form-text text-red"></small>
                </div>
              </div> 
                 



          
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Bersihkan</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>  
  </div>
</div>

  

  
<!-- Modal EDIT -->
<div class="modal fade modalEdit" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Cagar Budaya</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
       <form enctype="multipart/form-data" action="{{ url('cagar_budaya/edit')}}" method="POST"> 

      <div class="modal-body">
          <div class="card-body">
       
        @csrf
          <input type="hidden" name="id" >

             <div class="form-group">
            <label for="id_objek">ID Cagar Budaya</label>
            <input type="text" id="id_objek" name="id_objek" value="" class="form-control"@error('id_objek') is-invalid @enderror" value="{{ old('id_objek') }}" autofocus>
            @error('id_objek')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="nama_objek">Nama Cagar Budaya</label>
            <input type="text" id="nama_objek" name="nama_objek" value="" class="form-control"@error('nama_objek') is-invalid @enderror" value="{{ old('nama_objek') }}" autofocus>
            @error('nama_objek')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


              <div class="form-group">
                <label>Jenis Objek</label>
                <select name="jenis_objek_id" id="jenis_objekedit" class="form-control">
                  <option value="" >- Pilih Jenis Objek- </option>
                  @foreach ($jenis_objek as $item)
                    <option value="{{ $item->id }}">{{ $item->jenis_objek }}</option>
                  @endforeach
                </select>
              </div>


            <div class="form-group">
            <label for="kode_alamat">Kode Alamat</label>
            <input type="text" id="kode_alamat" name="kode_alamat" value="" class="form-control"@error('kode_alamat') is-invalid @enderror" value="{{ old('kode_alamat') }}" autofocus>
            @error('kode_alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" id="longitude" name="longitude" value="" class="form-control"@error('longitude') is-invalid @enderror" value="{{ old('longitude') }}" autofocus>
            @error('longitude')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

           <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" id="latitude" name="latitude" value="" class="form-control"@error('latitude') is-invalid @enderror" value="{{ old('latitude') }}" autofocus>
            @error('latitude')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" id=keterangan" name="keterangan" value="" class="form-control"@error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" autofocus>
            @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
             

          <div class="form-group">
                <label class="">Foto<font color="">@</label>
                <div class="">
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="gambar" placeholder="Masukkan foto">
                    <small id="foto_error" class="form-text text-red"></small>
                </div>
          </div>  


          <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}" >
              <div class="form-group">
                <label class="">File SK<font color="">@PDF</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="foto" name="file" placeholder="Masukkan File">
                    @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <small id="file_error" class="form-text text-red"></small>
                </div>
              </div> 
                 


      

        </div>
         
            
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


@include('footer_mif')

<!-- JS EDIT CAGAR BUDAYA -->

<script>
$('body').on('click', '.buttonedit', function(){
  var id_objek=$(this).attr('id_objek');
  var nama_objek=$(this).attr('nama_objek');
  var url_objek=$(this).attr('url_objek');
  var jenis_objek=$(this).attr('jenis_objek');
  var kode_alamat=$(this).attr('kode_alamat');
  var longitude=$(this).attr('longitude');
  var latitude=$(this).attr('latitude');
  var keterangan=$(this).attr('keterangan');
  var id=$(this).attr('id');

  $('input[name=id_objek]').val(id_objek);
  $('input[name=nama_objek]').val(nama_objek);
  $('input[name=url_objek]').val(url_objek);
  $('#jenis_objekedit').val(jenis_objek).change();
  $('input[name=kode_alamat]').val(kode_alamat);
  $('input[name=longitude]').val(longitude);
  $('input[name=latitude]').val(latitude);
  $('input[name=keterangan]').val(keterangan);
  $('input[name=id]').val(id);
  $('#modalEdit').modal('show');
});
</script>

</body>
<script type="text/javascript">

  $(function () {
    var table = $('#data-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,
        responsive: true,

        ajax: "{{ url('json-cagar_budaya') }}",
        columns: [
        {
          "data": "id",
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },  
            {data: 'id_objek', name: 'id_objek'},
            {data: 'nama_objek', name: 'nama_objek'},
            {data: 'url_objek', name: 'url_objek'},
            {data: 'jenis_objek.jenis_objek', name: 'jenis_objek.jenis_objek'},
            {data: 'kode_alamat', name: 'kode_alamat'},
            {data: 'longitude', name: 'longitude'},
            {data: 'latitude', name: 'latitude'},
            // {data: 'keterangan', name: 'keterangan'},
            { "data": "keterangan",
              render: function (data, type, row, meta) {

              var text=data.substring(0, 100)+'...';
              return text;
              }
            },
          {
          "data": "foto",
          render: function (data, type, row, meta) {

                  var img="{{asset('image/cagar_budaya/')}}/"+data;
                  var gambar="<img src='"+img+"' width='40'/>"
                    return gambar;
                    }
          },

          {
          "data": "file_sk",
          render: function (data, type, row, meta) {
                  var file="{{asset('image/file/')}}/"+data;
                    return "<a href='"+file+"'>Download</a>";
                    }
          },
               
            {
          "data": "id",
          render: function (data, type, row, meta) {
                  let url='https://sigaya.siakkab.go.id';
                  
            let button = '<button id="'+data+'" id_objek="'+row['id_objek']+'" nama_objek="'+row['nama_objek']+'"  jenis_objek="'+row['jenis_objek_id']+'" kode_alamat="'+row['kode_alamat']+'" longitude="'+row['longitude']+'" latitude="'+row['latitude']+'"keterangan="'+row['keterangan']+'" class="buttonedit btn btn-sm btn-flat btn-primary "><i class="fas fa-fw fa-edit"></i></button> \n\
                    <a href="'+url+'/hapus/cagar_budaya/'+data+'" onclick="javascript:return confirm(\'Apakah Anda yakin Ingin Menghapus Data ?\')"class=" btn btn-sm btn-flat btn-dark"><i class="fas fa-fw fa-trash-alt"></i></a>';
              return button;
              }
              }
        ]
    });
  });


</script>
</html>





