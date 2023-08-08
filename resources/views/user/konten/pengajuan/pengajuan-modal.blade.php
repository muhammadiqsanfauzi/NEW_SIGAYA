<!-- boostrap company model -->
<div class="modal fade" id="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title"></h4>
            </div>
            <form action="javascript:void(0)" id="Form" name="Form" class="form-horizontal" method="POST" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="id_pengajuan" id="id_pengajuan">

                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <small><b>Nama Objek<font color="red">*</font></b></small>
                            <input type="text" class="form-control form-control-sm" id="nama_objek" name="nama_objek" placeholder="Masukkan nama objek">
                            <small id="nama_objek_error" class="form-text text-red"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <small><b>Jenis Objek<font color="red">*</font></b></small>
                            <select name="id_m_jenisobjek" id="id_m_jenisobjek" class="form-control form-control-sm">
                                <option value="" disabled selected>-Pilih jenis objek-</option>
                                <?php foreach ($jenis_objek as $jenis) { ?>
                                    <option value="<?= $jenis->id ?>"><?= $jenis->jenis_objek ?></option>
                                <?php } ?>
                            </select>
                            <small id="id_m_jenisobjek_error" class="form-text text-red"></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <div class="col-sm-12">
                                <small><b>Kecamatan</b><font color="red">*</font></small>
                                <select name="kode_kec" id="kode_kec" class="form-control form-control-sm">
                                    <option value="" selected disabled>-Pilih Kecamatan-</option>
                                    <?php foreach ($kecamatan['data'] as $kec) { ?>
                                        <option value="<?= $kec['kode_alamat'] ?>"><?= $kec['nama_alamat'] ?></option>
                                    <?php } ?>
                                </select>
                                <small id="kode_kec_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <div class="col-sm-12">
                                <small><b>Kampung</b><font color="red">*</font></small>
                                <select name="kode_alamat" id="kode_alamat" class="form-control form-control-sm"></select>
                                <small id="kode_alamat_error" class="form-text text-red"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Garis Lintang</b> <i class="text-muted">( Latitude )</i></small>
                                <input type="text" class="form-control form-control-sm" id="garis_lintang" name="garis_lintang" placeholder="Masukkan garis lintang">
                                <small class="form-text text-muted">Note : latitude</small>
                                <small id="garis_lintang_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Garis Bujur</b> <i class="text-muted">( Longitude )</i></small>
                                <input type="text" class="form-control form-control-sm" id="garis_bujur" name="garis_bujur" placeholder="Masukkan garis bujur">
                                <small class="form-text text-muted">Note : longitude</small>
                                <small id="garis_bujur_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Ketinggian</b> <i class="text-muted">( DPL )</i></small>
                                <input type="text" class="form-control form-control-sm" id="ketinggian" name="ketinggian" placeholder="Masukkan ketinggian">
                                <small class="form-text text-muted">Note : Ketinggian diatas permukaan laut</small>

                                <small id="ketinggian_error" class="form-text text-red"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <div class="col-sm-12">
                                <small><b>Warna Benda</b><font color="red">*</font></small>
                                <input type="text" class="form-control form-control-sm" id="warna_benda" name="warna_benda" placeholder="Masukkan warna benda">
                                <small id="warna_benda_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <div class="col-sm-12">
                                <small><b>Waktu Pembuatan</b></small>
                                <input type="date" class="form-control form-control-sm" id="waktu_pembuatan" name="waktu_pembuatan" placeholder="Masukkan waktu pembuatan">
                                <small id="waktu_pembuatan_error" class="form-text text-red"></small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <small><b>Tanda/warna benda/bangunan/situs/struktur</b></small>
                            <input type="text" class="form-control form-control-sm" id="tanda" name="tanda" placeholder="Tanda yang dimiliki benda">
                            <small id="tanda_error" class="form-text text-red"></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Dimensi Panjang</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="dimensi_panjang" name="dimensi_panjang" placeholder="Dimensi panjang">
                                <small id="dimensi_panjang_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Dimensi Tinggi</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="dimensi_tinggi" name="dimensi_tinggi" placeholder="Dimensi tinggi">
                                <small id="dimensi_tinggi_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Dimensi Lebar</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="dimensi_lebar" name="dimensi_lebar" placeholder="Dimensi lebar">
                                <small id="dimensi_lebar_error" class="form-text text-red"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Dimensi Tebal</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="dimensi_tebal" name="dimensi_tebal" placeholder="Dimensi tebal">
                                <small id="dimensi_tebal_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Dimensi kaki</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="dimensi_kaki" name="dimensi_kaki" placeholder="Dimensi kaki">
                                <small id="dimensi_kaki_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Dimensi Masa</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="dimensi_masa" name="dimensi_masa" placeholder="Dimensi masa">
                                <small id="dimensi_masa_error" class="form-text text-red"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Dimensi Volume</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="dimensi_volume" name="dimensi_volume" placeholder="Dimensi volume">
                                <small id="dimensi_volume_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Diameter Badan</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="diameter_badan" name="diameter_badan" placeholder="Diameter badan">
                                <small id="diameter_badan_error" class="form-text text-red"></small>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Diameter Atas</b> <i class="text-muted">( Meter )</i></small>
                                <input type="text" class="form-control form-control-sm" id="diameter_atas" name="diameter_atas" placeholder="Diameter atas">
                                <small id="diameter_atas_error" class="form-text text-red"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Keutuhan Objek</b><font color="red">*</font></small>
                                <select name="keutuhan_odcb" id="keutuhan_odcb" class="form-control form-control-sm">
                                    <option value="" selected disabled>-Pilih-</option>
                                    <option value="Utuh">Utuh</option>
                                    <option value="Tinggal Sebagian">Tinggal Sebagian</option>
                                </select>
                                <small id="keutuhan_odcb_error" class="form-text text-red"></small>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Pemeliharaan Objek</b><font color="red">*</font></small>
                                <select name="pemeliharaan_odcb" id="pemeliharaan_odcb" class="form-control form-control-sm">
                                    <option value="" selected disabled>-Pilih-</option>
                                    <option value="Terpelihara">Terpelihara</option>
                                    <option value="Tidak Terpelihara">Tidak Terpelihara</option>
                                </select>
                                <small id="pemeliharaan_odcb_error" class="form-text text-red"></small>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <div class="col-sm-12">
                                <small><b>Status Kepemilikan Objek</b><font color="red">*</font></small>
                                <select name="status_kepemilikan" id="status_kepemilikan" class="form-control form-control-sm">
                                    <option value="" selected disabled>-Pilih-</option>
                                    <option value="Pribadi">Pribadi</option>
                                    <option value="Tidak diketahui">Tidak diketahui</option>
                                </select>
                                <small id="status_kepemilikan_error" class="form-text text-red"></small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <small><b>Sejarah</b><font color="red">*</font></small>
                            <textarea class="form-control" name="sejarah" id="sejarah" rows="6"></textarea>
                            <small id="sejarah_error" class="form-text text-red"></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <small><b>Foto</b></small>
                        <div class="custom-file">
                            <input type="file" name="files[]" class="custom-file-input" id="customFile" multiple>
                            <label class="custom-file-label" for="customFile">Pilih Foto</label>
                            <small id="files_error" class="form-text text-red"></small>
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