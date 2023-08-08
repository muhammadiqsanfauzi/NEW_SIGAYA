@extends('user.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="row d-flex justify-content-center mb-5">
                <?php foreach ($file as $file): ?>
                    <div class="col-md-4 m-3">
                        <img class="rounded img-fluid" src="{{ asset('image/pengajuan/'.$file->file_pengajuan) }}" alt="">
                    </div>
                <?php endforeach ?>
            </div>

            <div class="row border rounded m-0 p-2 mb-3">

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">Nama Objek </div>
                        <div class="col-md-8">: <b>{{ $detail->nama_objek }}</b></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Jenis Objek </div>
                        <div class="col-md-8">: {{ $detail->jenis_objek }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Lokasi Objek </div>
                        <div class="col-md-8">: {{ $alamat['data'][0]['nama_alamat'] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Garis lintang (<i class="text-muted">Latitude</i>)</div>
                        <div class="col-md-8">: {{ $detail->garis_lintang }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Garis bujur (<i class="text-muted">Longitude</i>)</div>
                        <div class="col-md-8">: {{ $detail->garis_bujur }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Ketinggian (<i class="text-muted">DPL</i>) </div>
                        <div class="col-md-8">: {{ $detail->ketinggian }} </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Warna benda </div>
                        <div class="col-md-8">: {{ $detail->warna_benda }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Waktu pembuatan</div>
                        <div class="col-md-8">: {{ $detail->waktu_pembuatan }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">tanda</div>
                        <div class="col-md-8">: {{ $detail->tanda }}</div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">Dimensi panjang</div>
                        <div class="col-md-8">: {{ $detail->dimensi_panjang }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi tinggi</div>
                        <div class="col-md-8">: {{ $detail->dimensi_tinggi }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi lebar</div>
                        <div class="col-md-8">: {{ $detail->dimensi_lebar }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi tebal</div>
                        <div class="col-md-8">: {{ $detail->dimensi_tebal }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi kaki</div>
                        <div class="col-md-8">: {{ $detail->dimensi_kaki }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi masa</div>
                        <div class="col-md-8">: {{ $detail->dimensi_masa }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi volume</div>
                        <div class="col-md-8">: {{ $detail->dimensi_volume }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Diameter badan</div>
                        <div class="col-md-8">: {{ $detail->diameter_badan }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Diameter atas</div>
                        <div class="col-md-8">: {{ $detail->diameter_atas }} </div>
                    </div>
                </div>

            </div>
            <div class="border rounded p-3">

                <div class="row">
                    <div class="col-md-2">Keutuhan Objek</div>
                    <div class="col-md-10">: {{ $detail->keutuhan_odcb }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Pemeliharaan Objek</div>
                    <div class="col-md-10">: {{ $detail->pemeliharaan_odcb }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Status Kepemilikan</div>
                    <div class="col-md-10">: {{ $detail->status_kepemilikan }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Sejarah</div>
                    <div class="col-md-10">: {{ $detail->sejarah }}</div>
                </div>
                
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a class="btn btn-success" href="{{ url('u-read-pengajuan') }}" title="">Kembali</a>
        </div>
    </div>
</div>

@endsection