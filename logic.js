// PROCESS

var latitude;
var longitude;
var cEve = 1450915200;
var cDay = 1451001600;
var bDay = 1451088000;

// browser checks


// check geolocation is available
if ("geolocation" in navigator) {
    getLocationToSearch();
} else {

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
    getForecast();
  };

  function error(err) {
    console.warn('ERROR(' + err.code + ') ' + err.message);
  };

  navigator.geolocation.getCurrentPosition(success,error,options);

}

// pass that location to api


// find out if snow is on the agenda for 24-26 Dec in that location

// notify user

var responses = [
  "No.",
  "Maybe.",
  "Yes."
];

function getForecast() {
  // pass that location to api
  var url = 'https://api.forecast.io/forecast/KEY/'+ latitude + ',' + longitude + ',' + cDay;
  $.getJSON(url, function(data) {
    console.log(data);
  });
}

