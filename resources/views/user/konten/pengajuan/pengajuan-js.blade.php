<script type="text/javascript">

    var kode_kec = '';
    var kode_kampung = '';

    $(document).ready(function() {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#dt-pengajuan').DataTable({
            // order: [[1, 'ASC']],
            paging: true,

            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ url('u-read-pengajuan') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                },
                {
                    data: 'nama_objek',
                    name: 'nama_objek'
                },
                {
                    data: 'info_lain',
                    name: 'info_lain'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });



    $('#Form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('u-store-pengajuan')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $("#modal").modal('hide');
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
                $("#dt-pengajuan").DataTable().ajax.reload();

                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan.'
                })
            },
            error: function(response) {

                Toast.fire({
                    icon: 'error',
                    title: 'Opss...!!'
                })

                $('#nama_objek_error').text(response.responseJSON.errors.nama_objek);
                $('#id_m_jenisobjek_error').text(response.responseJSON.errors.id_m_jenisobjek);
                $('#kode_alamat_error').text(response.responseJSON.errors.kode_alamat);
                $('#garis_lintang_error').text(response.responseJSON.errors.garis_lintang);
                $('#garis_bujur_error').text(response.responseJSON.errors.garis_bujur);
                $('#ketinggian_error').text(response.responseJSON.errors.ketinggian);
                $('#warna_benda_error').text(response.responseJSON.errors.warna_benda);
                $('#waktu_pembuatan_error').text(response.responseJSON.errors.waktu_pembuatan);
                $('#tanda_error').text(response.responseJSON.errors.tanda);
                $('#dimensi_panjang_error').text(response.responseJSON.errors.dimensi_panjang);
                $('#dimensi_tinggi_error').text(response.responseJSON.errors.dimensi_tinggi);
                $('#dimensi_lebar_error').text(response.responseJSON.errors.dimensi_lebar);
                $('#dimensi_tebal_error').text(response.responseJSON.errors.dimensi_tebal);
                $('#dimensi_kaki_error').text(response.responseJSON.errors.dimensi_kaki);
                $('#dimensi_masa_error').text(response.responseJSON.errors.dimensi_masa);
                $('#dimensi_volume_error').text(response.responseJSON.errors.dimensi_volume);
                $('#diameter_badan_error').text(response.responseJSON.errors.diameter_badan);
                $('#diameter_atas_error').text(response.responseJSON.errors.diameter_atas);
                $('#keutuhan_odcb_error').text(response.responseJSON.errors.keutuhan_odcb);
                $('#pemeliharaan_odcb_error').text(response.responseJSON.errors.pemeliharaan_odcb);
                $('#status_kepemilikan_error').text(response.responseJSON.errors.status_kepemilikan);
                $('#sejarah_error').text(response.responseJSON.errors.sejarah);
                $('#files_error').text(response.responseJSON.errors.files);
            }
        });
    });

    function editFunc(id) {

        reset();

        $.ajax({
            type: "POST",
            url: "{{ url('u-edit-pengajuan') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                kode_kampung = res.kode_alamat;
                kode_kec = res.kode_alamat.substring(0, 8);

                $('#title').html("Edit Pengajuan");
                $('#modal').modal('show');
                $('#Form').trigger("reset");


                $('#id_pengajuan').val(res.id_pengajuan);
                $('#nama_objek').val(res.nama_objek);
                $('#kode_kec').val(kode_kec).change();
                $('#id_m_jenisobjek').val(res.id_m_jenisobjek).change();
                $('#garis_lintang').val(res.garis_lintang);
                $('#garis_bujur').val(res.garis_bujur);
                $('#ketinggian').val(res.ketinggian);
                $('#warna_benda').val(res.warna_benda);
                $('#waktu_pembuatan').val(res.waktu_pembuatan);
                $('#tanda').val(res.tanda);
                $('#dimensi_panjang').val(res.dimensi_panjang);
                $('#dimensi_tinggi').val(res.dimensi_tinggi);
                $('#dimensi_lebar').val(res.dimensi_lebar);
                $('#dimensi_tebal').val(res.dimensi_tebal);
                $('#dimensi_kaki').val(res.dimensi_kaki);
                $('#dimensi_masa').val(res.dimensi_masa);
                $('#dimensi_volume').val(res.dimensi_volume);
                $('#diameter_badan').val(res.diameter_badan);
                $('#diameter_atas').val(res.diameter_atas);
                $('#keutuhan_odcb').val(res.keutuhan_odcb).change();
                $('#pemeliharaan_odcb').val(res.pemeliharaan_odcb).change();
                $('#status_kepemilikan').val(res.status_kepemilikan).change();
                $('#sejarah').val(res.sejarah);
                $('#files').val(res.files);
            }
        });
    }

    function deleteFunc(id) {
        if (confirm("Delete Record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('u-delete-pengajuan') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $("#dt-pengajuan").DataTable().ajax.reload();
                    Toast.fire({
                        icon: 'success',
                        title: ' Data berhasil dihapus.'
                    })
                }
            });
        }
    }

    function add() {
        $('#title').html("Form Pengajuan");
        $('#modal').modal('show');
    }

    function cencel() {
        $("#modal").modal('hide');
    }

    function reset(){
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