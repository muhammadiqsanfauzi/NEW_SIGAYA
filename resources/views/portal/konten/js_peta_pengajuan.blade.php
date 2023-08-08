<!-- jQuery -->
<script src="{{ asset('assetad/plugins/jquery/jquery.min.js') }}"></script>
<!-- maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDas45XqaLmyBoLtLlxHQ3R5oLLYirbdXs&callback=loadMap&libraries=geometry"></script>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id_jenis = '';
    var markers = [];
    getData();

    //FILTER
    $('#kategori').change(function() {
        id_jenis = $('#kategori').val();
        getData();
        markers = [];
    });

    function getData() {

        $.ajax({
            type: "POST",
            url: "{{ url('peta_pengajuan') }}",
            data: {
                id : id_jenis
            },
            dataType: 'json',
            success: function(res) {

            $.each(res, function(i, response) {
                markers.push([response.nama_objek, 
                                parseFloat(response.garis_lintang), 
                                parseFloat(response.garis_bujur),
                                response.sejarah
                                ]);
            });

            initialize();
            }
        });
    }

    //cagar budaya nasional, kominfo, dinas pendidikan, siakkab, epusda, siak badelau
 
    function initialize() {
        console.log(markers);
        var mapCanvas = document.getElementById('googleMap');
        var mapOptions = {
            center: new google.maps.LatLng(0.8085586156104532, 102.02639887197164),
            zoom:9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }     
        var map = new google.maps.Map(mapCanvas, mapOptions)

        var infowindow = new google.maps.InfoWindow(), marker, i;
        var bounds = new google.maps.LatLngBounds(); // diluar looping
        for (i = 0; i < markers.length; i++) {  

            pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(pos); // di dalam looping
            marker = new google.maps.Marker({
                position: pos,
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent('<div style="width:250px;"><h5>'+ markers[i][0] +'</h5><div class="mt-2">'+ markers[i][3].substring(0,150) +'...</div><a href="#") }}" class="mt-2 btn btn-sm btn-success w-100">selengkapnya</a></div>');
                    infowindow.open(map, marker);
                }
            })(marker, i));
            map.fitBounds(bounds); // setelah looping
        }

    }
    
    google.maps.event.addDomListener(window, 'load', initialize);
</script>