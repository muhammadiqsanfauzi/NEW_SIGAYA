<script type="text/javascript">
    var kode_kec = '';
    var kode_kampung = '';

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $('#Form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('u-store-profil')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $("#modal").modal('hide');
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
                location.reload();

                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan.'
                })
            },
            error: function(response) {

                Toast.fire({
                    icon: 'error',
                    title: 'Opss...!'
                })

                $('#nama_error').text(response.responseJSON.errors.nama);
                $('#nik_error').text(response.responseJSON.errors.nik);
                $('#kelamin_error').text(response.responseJSON.errors.kelamin);
                $('#tpt_lahir_error').text(response.responseJSON.errors.tpt_lahir);
                $('#tgl_lahir_error').text(response.responseJSON.errors.tgl_lahir);
                $('#kode_alamat_error').text(response.responseJSON.errors.kode_alamat);
                $('#rt_error').text(response.responseJSON.errors.rt);
                $('#rw_error').text(response.responseJSON.errors.rw);
                $('#email_error').text(response.responseJSON.errors.email);
                $('#hp_error').text(response.responseJSON.errors.hp);
                $('#file_foto_error').text(response.responseJSON.errors.file_foto_lama);
                $('#file_foto_error').text(response.responseJSON.errors.file_foto);
                $('#file_ktp_error').text(response.responseJSON.errors.file_ktp_lama);
                $('#file_ktp_error').text(response.responseJSON.errors.file_ktp);
            }
        });
    });

    $('#FormPass').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('u-edit-password')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    $("#modal-pass").modal('hide');
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    // location.reload();

                    Toast.fire({
                        icon: 'success',
                        title: 'Password berhasil disimpan. Silahkan Logout kemudian Login kembali menggunakan password baru'
                    })
                } else {
                    $('#email2_error').text(response.email);
                    Toast.fire({
                        icon: 'error',
                        title: 'Email salah.'
                    })
                }
            },
            error: function(response) {
                $('#email2_error').text(response.responseJSON.errors.email);
                $('#password_lama_error').text(response.responseJSON.errors.password_lama);
                $('#password_error').text(response.responseJSON.errors.password);
            }
        });
    });

    function profil() {
        $('#title').html("Form Profil");
        $('#modal').modal('show');
    }

    function edit_profil(id) {
        $('#title').html("Form Profil");
        $('#modal').modal('show');
        // kec();

        $.ajax({
            type: "POST",
            url: "{{ url('u-edit-profil') }}",
            data: {},
            dataType: 'json',
            success: function(res) {
                kode_kampung = res.kode_alamat;
                kec = res.kode_alamat.substring(0, 8);

                $('#kelamin').val(res.kelamin).change();
                $('#kode_kec').val(kec).change();
            }
        });
    }

    function pass() {
        $('#title-pass').html("Form Pasword");
        $('#modal-pass').modal('show');
    }

    function cencel() {
        $("#modal").modal('hide');
    }

    function cencel_pass() {
        $("#modal-pass").modal('hide');
        $("#FormPass").trigger('reset');
    }

    $('#kode_kec').change(function() {
        kode_kec = $('#kode_kec').val();
        kampung();
    });

    function kampung() {
        $.ajax({
            type: "POST",
            url: "{{ url('u-kampung') }}",
            data: {
                kode: kode_kec
            },
            dataType: 'json',
            success: function(res) {
                let content = '';
                content += `<option value="" selected disabled>- Pilih Desa/Kampung -</option>`;
                $.each(res.data, function(i, res) {
                    if (res.kode_alamat == kode_kampung) {
                        content += `<option value="` + res.kode_alamat + `" selected>` + res.nama_alamat + `</option>`;
                    } else {
                        content += `<option value="` + res.kode_alamat + `">` + res.nama_alamat + `</option>`;
                    }
                });
                $('#kode_alamat').html(content);
            }
        });
    }

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>