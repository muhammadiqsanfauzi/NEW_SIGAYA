@include('headcss_mif')
@include('sidebar_mif')
@include('navbar_mif')

<div class="container-fluid">
    <div class="card">

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
@include('daftar_pengajuan.js_daftar_pengajuan')

@include('footer_mif')

</body>
</html>