
											 function save(){
												 var f=document.getElementById('forma');
												 f.action = "ceo_franinsert.php";
												 f.submit();
											 }

											 function del(){
												 var f=document.getElementById('formb');
												 f.action = "ceo_frandel.php";
												 f.submit();
											 }

      										var customLabel = {
          										label: 'F'
      										};

										      function initMap() {
										        var map = new google.maps.Map(document.getElementById('map'), {
										          zoom: 16,
										          center: {lat: 37.56653500 , lng: 126.97796920}
										        });
        										var infoWindow = new google.maps.InfoWindow;
										        var geocoder = new google.maps.Geocoder();

										        document.getElementById('submit').addEventListener('click', function() {
										          geocodeAddress(geocoder, map);
										        });

          									// Change this depending on the name of your PHP or XML file
          									downloadUrl('cc_brandview.php', function(data) {
            								var xml = data.responseXML;
            								var markers = xml.documentElement.getElementsByTagName('marker');
            									Array.prototype.forEach.call(markers, function(markerElem) {
														var id = markerElem.getAttribute('id');
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
														document.getElementById('fid').value = id;
														document.getElementById('fname').value = name;
														document.getElementById('fcont').value = ffcontent;
														document.getElementById('fphone').value = phone;
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
										            var lat = results[0].geometry.location.lat();
										            var lng = results[0].geometry.location.lng();
										            var marker = new google.maps.Marker({
										              map: resultsMap,
										              position: results[0].geometry.location
										            });
										          } else {
										            alert('Geocode was not successful for the following reason: ' + status);
										          }
										          viewT(lat,lng);
										        });
										      }

										      function viewT(lat,lng){
										        document.getElementById('lat').value = lat;
										        document.getElementById('lng').value = lng;
										      }

      										function doNothing() {}
