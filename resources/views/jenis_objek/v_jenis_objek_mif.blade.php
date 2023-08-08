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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">TABEL JENIS OBJEK</h3>
                <div class="col-xs-12 col-sm-12 col-md-20 text-right">
            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="{{route('jenis_objek.create') }}"><i class=" fa fa-plus"></i> Tambah Jenis Objek</a>
            </div>
              </div>

              <div class="card-body">
                <table id="data-table"  class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>NAMA JENIS OBJEK</th>
                  <th>URL</th>
                  <th>PILIHAN</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                  <th>NAMA JENIS OBJEK</th>
                  <th>URL</th>
                  <th>PILIHAN</th>
                  </tr>
                  </tfoot>
                  @foreach ($jenis_objek as $jenis_objek)
                  </thead>
                  <tbody>
                  <!--<tr>-->
                  <!--  <td>{{ ++$i }}</td>-->
                  <!--  <td>{{ $jenis_objek->jenis_objek }}</td>-->
                  <!--  <td>-->
                    
                  <!--<button class="btn btn-success btn-sm tombolEdit" id="{{$jenis_objek->id}}"><i class="fa fa-pen"></i> </button>-->
                  
                  <!--<form action="{{ url('jenis_objek/'.$jenis_objek->id) }}" method="post" class="d-in line" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus..?')">-->
                  <!--@method('delete')-->
                  <!--@csrf-->
                  <!--<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>-->
                  <!--</form>-->
                  <!--  @endforeach-->
                  </tbody>

                </table>
              </div>
            </div>
           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 


<!-- MODAL EDIT SATUAN -->

<div class="modal modal-fullscreen-sm-down modalEdit" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Objek</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form enctype="multipart/form-data" action="{{ url('jenis_objek/edit')}}" method="POST"> 

      <div class="modal-body">
          <div class="card-body">
        @csrf
          <input type="hidden" name="id" >
          <div class="form-group">
            <label for="jenis_objek">Jenis Objek</label>
            <input type="text" id="formjenis_objek" name="jenis_objek" value="" class="form-control"@error('jenis_objek') is-invalid @enderror" value="{{ old('jenis_objek') }}" autofocus>
            @error('jenis_objek')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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


      
<!-- Star Modal  --> 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Nama Jenis Objek</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
    @endforeach
    
      <div class="card-body">
               <form action="{{ route('jenis_objek.store') }}" method="POST"> 
               @csrf

                 <div class="form-group">
                   <label for="jenis_objek">Nama Jenis Objek</label>
                   <input type="text" name="jenis_objek" class="form-control"@error('jenis_objek') is-invalid @enderror" value="{{ old('jenis_objek') }}" autofocus>
                   @error('jenis_objek')
                   <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
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

<!-- JS EDIT MODAL -->

<script>
$('body').on('click', '.buttonedit', function(){
  var nama=$(this).attr('nama');
  var jenis_objek=$(this).attr('jenis_objek');
  var url=$(this).attr('url');
  var id=$(this).attr('id');
  $('input[name=id]').val(id);
  $('#jenis_objekedit').val(jenis_objek);
  $('#formjenis_objek').val(nama);
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
        ajax: "{{ url('json-jenis_objek') }}",
       columns: [
        {
          "data": "id",
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
              }
        },
            {data: 'jenis_objek', name: 'jenis_objek'},
            {data: 'url', name: 'url'},
               
            {
    "data": "id",
    render: function (data, type, row, meta) {
            let url='https://sicabud.siakkab.go.id';
          let button = '<button id="'+data+'" nama="'+row['jenis_objek']+'" jenis_objek="'+row['id']+'"  class="buttonedit btn btn-sm btn-flat btn-primary"><i class="fas fa-fw fa-edit"></i></button> \n\
                    <a href="'+url+'/hapus/jenis_objek/'+data+'" onclick="javascript:return confirm(\'Apakah Anda yakin Ingin Menghapus Data ?\')" class="btn btn-sm btn-flat btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>';
                    
              return button;
              }
              }
        ]
    });
  });
</script>
</html>
@include('footer_mif')



