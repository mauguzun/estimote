<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />


</head>
<body>
<div class="container-scroller">

<div id="map" style="width:100%;height: 100vh;">

</div>


</div>

@include('admin.includes.scripts')
@yield('scripts')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX50gEvAyz9A6Sh3BMvC9eOblbLLZOses&libraries=places"></script>

<script>
    const map = new google.maps.Map(document.getElementById('map'),
        {
            center:
                {
                    lat: 50.6441194, lng: 5.4464222
                },
            zoom: 14,
            mapTypeId:google.maps.MapTypeId.SATELLITE
        });


    let stands = JSON.parse(<?php echo json_encode($stands) ?>);

    stands.forEach(item=>{
        let point =   new google.maps.Marker({
            position: {lat:parseFloat(item.lat),lng:parseFloat(item.lng)},
            map: map,
            title: item.title + '-'  + item.id,
            item:item
        });

        google.maps.event.addListener(point, 'click', function ()
        {
                     alert(JSON.stringify(item, null, 4))
        });
    })




</script>




</body>
</html>
