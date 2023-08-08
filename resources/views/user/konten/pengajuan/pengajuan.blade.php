@extends('user.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            @if ($profil->status == 0)
            <a href="javascript:void(0)" data-original-title="Pengajuan" class="btn btn-danger" title="Data anda belum diverifikasi oleh admin, atau data anda belum lengkap">Tambah <i class="fa fa-lock"></i></a>
            @else
            <a href="javascript:void(0)" onClick="add()" data-original-title="Pengajuan" class="btn btn-primary edit">Tambah</a>
            @endif
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            @if ($profil->hp == Null)
            <div class="alert-warning rounded w-100 mb-2 p-2"><center>Silahkan Lengkapi data diri terlebih dahulu sebelum mengajukan Cagar Budaya.</center></div>
            <div class="mb-3 w-100"><center><a href="{{url('u-profil')}}">lihat profil</a></center></div>
            @endif
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
@include('user.konten.'.$modal)

@endsection