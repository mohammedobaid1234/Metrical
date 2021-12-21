
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZYYSd9lqr4zV1y-2INws8WUehofr9zFg&callback=initMap">
</script>
<script>
   let map = new google.maps.Map(document.getElementById('map'), {
  center: {lat: -34.397, lng: 150.644},
  zoom: 8
});

const uluru = { lat: -34.397, lng: 150.644 };
let marker = new google.maps.Marker({
    position: uluru,
    map: map,
    draggable: true
});
 // move pin and current location
 
            
/*google.maps.event.addListener(marker,'position_changed',
    function (){
    let lat = marker.position.lat()
    let lng = marker.position.lng()
    $('#lat').val(lat)
    $('#lng').val(lng)
 });*/



</script>
