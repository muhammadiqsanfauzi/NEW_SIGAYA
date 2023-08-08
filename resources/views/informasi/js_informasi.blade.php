<script type="text/javascript">
    $(document).ready(function() {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#dt-informasi').DataTable({
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
            ajax: "{{ url('read_informasi') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                },
                {
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'isi',
                    name: 'isi'
                },
                {
                    data: 'image',
                    name: 'image'
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
            url: "{{ url('store_informasi')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $("#modal").modal('hide');
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
                $("#dt-informasi").DataTable().ajax.reload();

                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan.'
                })
            },
            error: function(response) {
                console.log(response);

                Toast.fire({
                    icon: 'error',
                    title: 'Opss...!!'
                })

                $('#judul_error').text(response.responseJSON.errors.judul);
                $('#isi_error').text(response.responseJSON.errors.isi);
                
            }
        });
    });

    function editFunc(id) {

        reset();

        $.ajax({
            type: "POST",
            url: "{{ url('edit_informasi') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {

                $('#title').html("Edit informasi");
                $('#modal').modal('show');
                $('#Form').trigger("reset");

                $('#id').val(res.id);
                $('#judul').val(res.judul);
                $('#isi').val(res.isi);
                $('#file_lama').val(res.file);
                
            }
        });
    }

    function deleteFunc(id) {
        if (confirm("Delete Record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('delete_informasi') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $("#dt-informasi").DataTable().ajax.reload();
                    Toast.fire({
                        icon: 'success',
                        title: ' Data berhasil dihapus.'
                    })
                }
            });
        }
    }

    function add() {
        $('#title').html("Form informasi");
        $('#modal').modal('show');
    }

    function cencel() {
        $("#modal").modal('hide');
    }

    function reset(){
    }

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>

<script type="text/javascript">

    $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });

</script>