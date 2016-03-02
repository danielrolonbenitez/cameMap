var pridat;
var map;
var marker = null;
var infowindow = null;
function initialize() {


// Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
       



 var locc = new google.maps.LatLng(49.938682,17.903331);

 var mapOptions = {
    zoom: 14,
    center: locc,
    mapTypeId: google.maps.MapTypeId.ROADMAP
                  }

map = new google.maps.Map(document.getElementById('mapa'), mapOptions);

 map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);// insert input 'pac_input' into map.
 // Bias the SearchBox results towards current map's viewport.
       

var markers = [];


// Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      console.log(place);

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });





 //directionsDisplay.setMap(map);

var contentwindow = '<div>your point</div>'
infowindow = new google.maps.InfoWindow({
    content: contentwindow
 });

google.maps.event.addListener(map, 'rightclick', function(event) {

//console.log(event.latLng);
placeMarker(event.latLng);
});

}

function placeMarker(location) {


if (marker) {
    marker.setPosition(location);
  var lat = marker.getPosition().lat();
  var log = marker.getPosition().lng();


} else {
 marker = new google.maps.Marker({
      position: location,
      map: map,
      title: 'My point',
      draggable: true,
     });
   // IF I REMOVE THIS PART -> IT WORKS, BUT WITHOUT INFOWINDOW
   google.maps.event.addListener(marker, 'click', function(){
       infowindow.open(map, marker);
   });
 }
}







google.maps.event.addDomListener(window, 'load', initialize);