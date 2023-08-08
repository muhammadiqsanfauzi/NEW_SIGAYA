<!-- boostrap company model -->
<div class="modal fade" id="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title"></h4>
            </div>
            <form action="javascript:void(0)" id="Form" name="Form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" id="id_user" value="{{ $profil->id_user }}">
                <input type="hidden" name="file_foto_lama" id="file_foto_lama" value="{{ $profil->file_foto }}">
                <input type="hidden" name="file_ktp_lama" id="file_ktp_lama" value="{{ $profil->file_ktp }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Nama<font color="red">*</font></small>
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $profil->nama }}">
                                    <small id="nama_error" class="form-text text-red"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>NIK<font color="red">*</font></small>
                                    <input type="text" class="form-control form-control-sm" id="nik" name="nik" placeholder="Masukkan NIK" value="{{ $profil->nik }}">
                                    <small id="nik_error" class="form-text text-red"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Kelamin<font color="red">*</font></small>
                                    <select name="kelamin" id="kelamin" class="form-control form-control-sm">
                                        <option value="" disabled selected>-Pilih jenis Kelamin-</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="0">Perempuan</option>
                                    </select>
                                    <!-- <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $profil->nama }}"> -->
                                    <small id="kelamin_error" class="form-text text-red"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Tempat Lahir<font color="red">*</font></small>
                                    <input type="text" class="form-control form-control-sm" id="tpt_lahir" name="tpt_lahir" placeholder="Masukkan Tempat lahir" value="{{ $profil->tpt_lahir }}">
                                    <small id="tpt_lahir_error" class="form-text text-red"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Tanggal Lahir<font color="red">*</font></small>
                                    <input type="date" class="form-control form-control-sm" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ $profil->tgl_lahir }}">
                                    <small id="tgl_lahir_error" class="form-text text-red"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Kecamatan<font color="red">*</font></small>
                                    <select name="kode_kec" id="kode_kec" class="form-control form-control-sm">
                                        <option value="" selected disabled>-Pilih Kecamatan-</option>
                                        <?php foreach ($kecamatan['data'] as $kec) { ?>
                                            <option value="<?= $kec['kode_alamat'] ?>"><?= $kec['nama_alamat'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <small id="kode_kec_error" class="form-text text-red"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Kampung<font color="red">*</font></small>
                                    <select name="kode_alamat" id="kode_alamat" class="form-control form-control-sm"></select>
                                    <small id="kode_alamat_error" class="form-text text-red"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>RT/RW<font color="red">*</font></small>
                                    <div class="row">
                                        <div class="col"><input type="text" name="rt" id="rt" class="form-control form-control-sm" placeholder="Masukkan RT" value="{{ $profil->rt }}"></div>
                                        <div class="col"><input type="text" name="rw" id="rw" class="form-control form-control-sm" placeholder="Masukkan RW" value="{{ $profil->rw }}"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><small id="rt_error" class="form-text text-red"></small></div>
                                        <div class="col"><small id="rw_error" class="form-text text-red"></small></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Email<font color="red">*</font></small>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Masukkan Email" value="{{ $profil->email }}">
                                    <small id="email_error" class="form-text text-red"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Hp<font color="red">*</font></small>
                                    <input type="hp" class="form-control form-control-sm" id="hp" name="hp" placeholder="Masukkan HP" value="{{ $profil->hp }}">
                                    <small id="hp_error" class="form-text text-red"></small>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Foto Diri<font color="red">*</font></small>
                                    <input type="file" class="form-control form-control-sm" id="file_foto" name="file_foto" placeholder="Masukkan Foto">
                                    <small id="file_foto_error" class="form-text text-red"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Foto KTP<font color="red">*</font></small>
                                    <input type="file" class="form-control form-control-sm" id="file_ktp" name="file_ktp" placeholder="Masukkan Foto KTP    ">
                                    <small id="file_ktp_error" class="form-text text-red"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-danger mr-1" id="btn-cencel" onClick="cencel()">Kembali</a>
                    <button type="submit" class="btn btn-success" id="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end bootstrap model -->

<!-- boostrap company model -->
<div class="modal fade" id="modal-pass" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-pass"></h4>
            </div>
            <form action="javascript:void(0)" id="FormPass" name="FormPass" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Email<font color="red">*</font></small>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Masukkan email">
                                    <small id="email2_error" class="form-text text-red"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <small>Password Baru<font color="red">*</font></small>
                                    <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Masukkan Password baru">
                                    <small id="password_error" class="form-text text-red"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-danger mr-1" id="btn-cencel" onClick="cencel_pass()">Kembali</a>
                    <button type="submit" class="btn btn-success" id="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end bootstrap model -->