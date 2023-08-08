@include('headcss_mif')
@include('sidebar_mif')
@include('navbar_mif')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content --> 
  <section class="content">

<div class="container-fluid">
    <div class="card mt-3">
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
                        <div class="col-md-8">: {{ $detail->ketinggian }} Meter</div>
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
                        <div class="col-md-8">: {{ $detail->dimensi_panjang }} Meter</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi tinggi</div>
                        <div class="col-md-8">: {{ $detail->dimensi_tinggi }} Meter</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi lebar</div>
                        <div class="col-md-8">: {{ $detail->dimensi_lebar }} Meter</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi tebal</div>
                        <div class="col-md-8">: {{ $detail->dimensi_tebal }} Meter</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi kaki</div>
                        <div class="col-md-8">: {{ $detail->dimensi_kaki }} Meter</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi masa</div>
                        <div class="col-md-8">: {{ $detail->dimensi_masa }} Meter</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Dimensi volume</div>
                        <div class="col-md-8">: {{ $detail->dimensi_volume }} Meter</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Diameter badan</div>
                        <div class="col-md-8">: {{ $detail->diameter_badan }} Meter</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Diameter atas</div>
                        <div class="col-md-8">: {{ $detail->diameter_atas }} Meter</div>
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

            <div class="border rounded p-3 mt-3">

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">Diajukan Oleh</div>
                            <div class="col-md-9">: {{ $detail->nama }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">NIK</div>
                            <div class="col-md-9">: {{ $detail->nik }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Kelamin</div>
                            <div class="col-md-9">: {{ $detail->kelamin }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-2">No Hp</div>
                            <div class="col-md-10">: {{ $detail->hp }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">Email</div>
                            <div class="col-md-10">: {{ $detail->email }}</div>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>
        <div class="card-footer d-flex justify-content-end">
            <a class="btn btn-danger mr-1" href="{{ url('daftar_pengajuan') }}" title="">Kembali</a>
            <?php if ($detail->status == 0): ?>
                <a href="javascript:void(0);" id="verifikasi" onClick="verifFunc({{$detail->id_pengajuan}} )" title="Verifikasi pengajuan!" class="btn btn-success"> Verifikasi </a>  
            <?php endif ?>
        </div>
    </div>
</div>

</section>
</div>

@include('footer_mif')


<script>

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function verifFunc(id) {

        if (confirm("Verifikasi pengajuan ini?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('verifikasi-pengajuan') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    location.replace("{{ url('daftar_pengajuan') }}");
                    Toast.fire({
                        icon: 'success',
                        title: ' Data berhasil di verifikasi!'
                    })
                }
            });
        }
    }

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

</script>

</body>
</html>