@include('headcss_mif')
@include('navbarheader_mif')
@include('sidebar_mif')

 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <!-- <h1>Halaman Tambah tempat</h1> -->
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
         <!-- left column -->
         <div class="col-md-6">
           <!-- general form elements -->
           <div class="card card-info">
             <div class="card-header">
               <h3 class="card-title">Form Tambah Jenis Komoditas</h3>
             </div>
  
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

               <!-- /.card-body -->
               <div class="card-footer">
                 <button type="reset" class="btn btn-dark">Reset</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
             
           </div>
           <!-- /.card -->


         </div>
        
       </div>

     </div>
   </section>
 </div>
 </form> 
@include('footer_mif')
