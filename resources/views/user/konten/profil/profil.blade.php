@extends('user.template')

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <!-- <div class="container"> -->
        <div class="row card">
            <div class="card-body">
                <div class="row d-flex justify-content-center pb-3 mb-3 border-bottom">
                    <?php

use Symfony\Component\VarDumper\VarDumper;

if ($profil->file_foto == '') {
                        $foto = "image/avatar3.png";
                        $ktp = "image/no-image.jpg";
                    } else {
                        $foto = "image/user/$profil->file_foto";
                        $ktp = "image/user/$profil->file_ktp";
                    }
                    ?>
                    <img class="img-fluid rounded m-1 mr-4" style="max-height: 200px;" src="{{ asset($foto) }}" alt="">
                    <img class="img-fluid rounded m-1" style="max-height: 200px;" src="{{ asset($ktp) }}" alt="">
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 col-sm-8">
                        <div class="row">
                            <div class="col-md-4">Nama</div>
                            <div class="col">: {{ $profil->nama }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">NIK</div>
                            <div class="col">: {{ $profil->nik }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Kelamin</div>
                            <div class="col">: {{ $profil->kelamin }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Tempat/Tgl lahir</div>
                            <div class="col">: {{ $profil->tpt_lahir.' / '.$profil->tgl_lahir }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">Alamat</div>
                            @if ($alamat['data'] == "Data tidak ditemukan")
                            <div class="col-md-8">: -</div>
                            @else
                            <div class="col-md-8">: <?= $alamat['data'][0]['nama_alamat']; ?></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4">RT/RW</div>
                            <div class="col-md-8">: {{ $profil->rt.' / '.$profil->rt }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">No Hp</div>
                            <div class="col-md-8">: {{ $profil->hp }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Email</div>
                            <div class="col-md-8">: {{ $profil->email }}</div>
                        </div>
                    </div>
                </div>
                <div class=" row d-flex justify-content-center mt-5">
                    @if ($profil->hp == Null)
                    <a href="javascript:void(0)" onClick="profil()" data-original-title="Lengkapi Profil" class="btn btn-warning">Lengkapi Profil</a>
                    @else
                    <a href="javascript:void(0)" onClick="edit_profil('{{$profil->id_user }}')" data-original-title="Edit" class="btn btn-success">Edit Profil</a>
                    @endif
                    <a  href="javascript:void(0)" onClick="pass()" class="btn btn-danger ml-1">Edit Password</a>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>
@include('user.konten.'.$modal)

@endsection