<!-- boostrap company model -->
<div class="modal fade" id="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title"></h4>
            </div>
            <form action="javascript:void(0)" id="Form" name="Form" class="form-horizontal" method="POST" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="file_lama" id="file_lama">

                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <small><b>Judul<font color="red">*</font></b></small>
                            <input type="text" class="form-control form-control-sm" id="judul" name="judul" placeholder="Masukkan judul">
                            <small id="judul_error" class="form-text text-red"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <small><b>Isi Informasi</b><font color="red">*</font></small>
                            <textarea class="form-control" name="isi" id="isi" rows="6"></textarea>
                            <small id="isi_error" class="form-text text-red"></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <small><b>Foto</b></small>
                        <div class="custom-file">
                            <input type="file" name="files" class="custom-file-input" id="customFile">
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