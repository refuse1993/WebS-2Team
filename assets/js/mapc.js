
var customLabel = {
label: 'F'
};

function initMap() {
var map = new google.maps.Map(document.getElementById('map'), {
center: new google.maps.LatLng(37.56653500, 126.97796920),
zoom: 16
});
var infoWindow = new google.maps.InfoWindow;
var geocoder = new google.maps.Geocoder();

document.getElementById('submitmap').addEventListener('click', function() {
geocodeAddress(geocoder, map);
});

// Change this depending on the name of your PHP or XML file
downloadUrl('cc_brandview.php', function(data) {
var xml = data.responseXML;
var markers = xml.documentElement.getElementsByTagName('marker');
Array.prototype.forEach.call(markers, function(markerElem) {
var name = markerElem.getAttribute('name');
var phone = markerElem.getAttribute('phone');
var ffcontent = markerElem.getAttribute('content');
var point = new google.maps.LatLng(
parseFloat(markerElem.getAttribute('lat')),
parseFloat(markerElem.getAttribute('lng')));

var infowincontent = document.createElement('div');
var strong = document.createElement('strong');
strong.textContent = name
infowincontent.appendChild(strong);
infowincontent.appendChild(document.createElement('br'));

var text = document.createElement('text');
text.textContent = ffcontent
infowincontent.appendChild(text);
infowincontent.appendChild(document.createElement('br'));

var phonen = document.createElement('text');
phonen.textContent = phone
infowincontent.appendChild(phonen);

var icon = customLabel || {};
var marker = new google.maps.Marker({
map: map,
position: point,
label: icon.label
});
marker.addListener('click', function() {
infoWindow.setContent(infowincontent);
infoWindow.open(map, marker);
});
});
});
}

function downloadUrl(url, callback) {
var request = window.ActiveXObject ?
new ActiveXObject('Microsoft.XMLHTTP') :
new XMLHttpRequest;

request.onreadystatechange = function() {
if (request.readyState == 4) {
request.onreadystatechange = doNothing;
callback(request, request.status);
}
};

request.open('GET', url, true);
request.send(null);
}

function geocodeAddress(geocoder, resultsMap) {
var address = document.getElementById('address').value;
geocoder.geocode({'address': address}, function(results, status) {
  if (status === 'OK') {
  resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
      map: resultsMap,
      position: results[0].geometry.location
      });
      marker.setMap(null);
  } else {
  alert('Geocode was not successful for the following reason: ' + status);
  }
});
}

function doNothing() {}
