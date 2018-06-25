 <?php     include("include/db.php"); 
           $selectRoom="SELECT * FROM `hostel`";
              $runRoom=mysqli_query($con, $selectRoom);
                while($row=mysqli_fetch_array($runRoom)){
                 $name[]=$row['name'];
                 $id[]=$row['id'];
                 $loc[]=$row['location'];
                    }
?>
  <style>
      #map {
        height: 100%;
      }
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
    <div id="map"></div>
    <script>
    var names = new Array();
    var id = new Array();
    var loc_data = new Array();
    var neighborhoods = new Array();
    <?php 
$count=0;
    foreach($name as $key => $val){ ?>
        names.push('<?php echo $val; ?>');
        id.push('<?php echo $id[$count]; ?>');
        neighborhoods.push('<?php echo $loc[$count]; ?>');
    <?php 
$count++;
} ?>
      var markers = [];
      var map;
   function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 33.651413, lng: 73.075746}
        });    
  drop();
      }
      function drop() {
        clearMarkers();
        for (var i = 0; i < neighborhoods.length; i++) {
          addMarkerWithTimeout(neighborhoods[i],id[i],names[i], i * 200);
        }
      }
      function addMarkerWithTimeout(neighborhoods,id,names, timeout) {
       window.setTimeout(function() {
        pos=neighborhoods.split(",");
        marker = new google.maps.Marker({
          map: map,
          title: names,
          animation: google.maps.Animation.DROP,
          position: {lat: parseFloat(pos[0]), lng: parseFloat(pos[1])}
        });
        marker.addListener('click', function() {
          infowindow(id);
        });
    }, timeout);   
      }
      function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
        markers = [];
      }
      function infowindow(id) {
        window.open('detail.php?id='+id,'_SELF');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd5qFRPFPUrmAfFjh5cPwFV-QhB_UwAIk&callback=initMap">
    </script>
 