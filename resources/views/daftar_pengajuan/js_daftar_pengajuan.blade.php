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
            ajax: "{{ url('daftar_pengajuan') }}",
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
                    $("#dt-pengajuan").DataTable().ajax.reload();
                    Toast.fire({
                        icon: 'success',
                        title: ' Data berhasil di verifikasi!'
                    })
                }
            });
        }
    }

    function deleteFunc(id) {
        if (confirm("Hapus data pengajuan ini?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('delete-pengajuan') }}",
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

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>