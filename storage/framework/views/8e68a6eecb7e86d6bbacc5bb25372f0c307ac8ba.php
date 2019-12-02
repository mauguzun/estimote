<div id="map" style="width:100%;height: 100vh;">

</div>

<br>
<br>
<br>
<p id="timer"/>Timing</p> <br>
<p id="xx"/>Timing</p> <br>
<input type="range" id="dates" min="0" max="<?=  count(json_decode($steps)); ?>" style="width: 100%"/>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX50gEvAyz9A6Sh3BMvC9eOblbLLZOses&libraries=places"></script>

<script>

    const map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 50.6441194, lng: 5.4464222}, zoom: 14,
        mapTypeId: google.maps.MapTypeId.SATELLITE
    });

    let stands = JSON.parse(<?php echo json_encode($stands) ?>);
    stands.forEach(item => {
        let point = new google.maps.Marker({
            position: {lat: parseFloat(item.lat), lng: parseFloat(item.lng)},
            map: map,

            item: item.title
        });

        //debug
        google.maps.event.addListener(point, 'click', function () {
            console.log(item);
            alert(JSON.stringify(item, null, 4))
        });
    });
    let steps = JSON.parse(<?php echo json_encode($steps) ?>);

    var flightPath = new google.maps.Polyline({
        path: steps,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 1
    });
    flightPath.setMap(map);

    let points = JSON.parse(<?php echo json_encode($points) ?>);

    points.forEach(item => {
        let point = new google.maps.Marker({
            position: {lat: parseFloat(item.lat), lng: parseFloat(item.lng)},
            map: map,
            title: item.start,
            item: item,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            }
        });

        //debug
        google.maps.event.addListener(point, 'click', function () {
            alert(JSON.stringify(item, null, 4))
        });
    });

    let car ;
    document.getElementById('dates').addEventListener('change', e => {

        let item = steps[parseInt(e.target.value)];
        document.getElementById('timer').innerHTML = item.added.date;
        document.getElementById('xx').innerHTML = e.target.value;
        if(car){
            car.setMap(null);
        }

        car  = new google.maps.Marker({
            position: {lat: parseFloat(item.lat), lng: parseFloat(item.lng)},
            map: map,
            title: item.start,
            item: item,
            icon: {
                url: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
            }
        });


    });

    //debug
    google.maps.event.addListener(map, 'click', function (event) {
        console.log(event.latLng.lat() + "," + event.latLng.lng());
    });


</script>

<?php /**PATH /home/vagrant/code/resources/views/admin/reports/map.blade.php ENDPATH**/ ?>