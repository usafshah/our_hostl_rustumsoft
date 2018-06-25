<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marker animations with <code>setTimeout()</code></title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        margin-left: -52px;
      }
    </style>
  </head>
  <body>
  
    <div id="floating-panel">
      <button id="drop" onclick="drop()">Drop Markers</button>
    </div>
    <div id="map"></div>
    <script>

      // If you're adding a number of markers, you may want to drop them on the map
      // consecutively rather than all at once. This example shows how to use
      // window.setTimeout() to space your markers' animation.

      var neighborhoods = [
        {lat: 33.652413, lng: 73.071540},
        {lat: 33.651761, lng: 73.078074 },
        {lat: 33.653467, lng: 73.074909},
        {lat: 33.650153, lng: 73.076883}
      ];
      var names = ["Washma hostel", "Best boys hostel", "Islamabad boys hostel","girls hostel"];

      var markers = [];
      var map;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 33.651413, lng: 73.075746}
        });
      }

      function drop() {
        clearMarkers();
        for (var i = 0; i < neighborhoods.length; i++) {
          addMarkerWithTimeout(neighborhoods[i],names[i], i * 200);
        }
      }

      function addMarkerWithTimeout(position,names, timeout) {
        window.setTimeout(function() {
          markers.push(new google.maps.Marker({
            position: position,
            map: map,
            title: names,
            animation: google.maps.Animation.DROP
          }));
        }, timeout);
      }

      function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
        markers = [];
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd5qFRPFPUrmAfFjh5cPwFV-QhB_UwAIk&callback=initMap">
    </script>
  </body>
</html>