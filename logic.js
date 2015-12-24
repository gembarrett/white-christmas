var latitude;
var longitude;

// check geolocation is available
if ("geolocation" in navigator) {
    getLocationToSearch();
} else {
  alert('Get a better browser!');
}

// get location to search
function getLocationToSearch() {
  var options = {
    enableHighAccuracy: false,
    timeout: 5000,
    maximumAge: 0
  };
  function success(pos) {
    var crd = pos.coords;
    longitude = crd.longitude;
    latitude = crd.latitude;
    passToPhp(latitude, longitude);
  };
  function error(err) {
    console.warn('ERROR(' + err.code + ') ' + err.message);
  };
  navigator.geolocation.getCurrentPosition(success,error,options);
}

function passToPhp(lat, long) {
  window.location.href="results.php?long="+long+"&lat="+lat;
}
