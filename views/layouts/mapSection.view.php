<!-- ========================MAP SECTION======================================== -->
<div class="map-container">
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
    <div id='gmap_canvas' style='height:600px;width:100%;'></div>
    <style>
        #gmap_canvas img {
            max-width: none!important;
            background: none!important
        }
    </style>
</div>
<script type='text/javascript'>
    function init_map() {
        var myOptions = {
            scrollwheel: false,
            zoom: 15,
            center: new google.maps.LatLng(56.9416185, 24.093912600000067),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(56.9416185, 24.093912600000067)
        });
        infowindow = new google.maps.InfoWindow({
            // content: none
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
    }
    google.maps.event.addDomListener(window, 'load', init_map);
</script>
<!-- ========================MAP SECTION END======================================== -->
