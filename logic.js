// process

// get location to search

// pass that location to api

// find out if snow is on the agenda for 24-26 Dec in that location

// notify user

var responses = [
  "No.",
  "Maybe.",
  "Yes."
];

console.log(responses[0]);

if ("geolocation" in navigator) {

  var options = {
    enableHighAccuracy: false,
    timeout: 5000,
    maximumAge: 0
  };

  function success(pos) {
    var crd = pos.coords;

    console.log(crd.latitude);
  }

  function error(err) {
    console.warn('ERROR(' + err.code + ') ' + err.message);
  };

  navigator.geolocation.getCurrentPosition(success,error,options);
} else {
  /* geolocation IS NOT available */
}

