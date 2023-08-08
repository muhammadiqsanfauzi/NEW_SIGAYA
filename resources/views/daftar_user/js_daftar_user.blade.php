<script type="text/javascript">

    var kode_kec = '';
    var kode_kampung = '';

    $(document).ready(function() {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#dt-user').DataTable({
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
            ajax: "{{ url('daftar_user') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                },
                {
                    data: 'col-image',
                    name: 'col-image'
                },
                {
                    data: 'col-nama',
                    name: 'col-nama'
                },
                {
                    data: 'col-info',
                    name: 'col-info'
                },
                {
                    data: 'col-action',
                    name: 'col-action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    function verifFunc(id) {
        if (confirm("Verifikasi User?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('verifikasi-user') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    Toast.fire({
                        icon: 'success',
                        title: ' Data berhasil diverifikasi.'
                    })
                    location.reload();
                }
            });
        }
    }

    function deleteFunc(id) {
        if (confirm("Delete User?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('delete-user') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    Toast.fire({
                        icon: 'success',
                        title: ' Data berhasil dihapus.'
                    })
                    location.reload();
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