<?php 
include  'header.php';
include  'db.php';
 ?>


<h1>Alfa Training </h1>
<div>
<p>Fon : 0800 3456500</p>

<p>Am Bahnhof 6 </p>
<p>33602 Bielefeld</p>
</div>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
    var myMap;
    var myLatlng = new google.maps.LatLng(52.0280862,8.5329976);
    function initialize() {
        var mapOptions = {
            zoom: 13,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP  ,
            scrollwheel: false
        }
        myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: myMap,
            title: 'Alfa Training',
            icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="map" style="width:1000px; height: 500px;">

</div>
<?php include  'footer.php'; ?>