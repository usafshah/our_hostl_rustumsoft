<?php 
include('includes/header.php');
error_reporting(0);
$get_id=$_GET['id'];
$get_p_id=$_GET['p_id'];


?>
   
    <div class="clearfix"></div>
    
    <div class="p-1"></div>
  
  <div class="main-sep"><img src="images/shadow.png" class="img-responsive" /></div>
  <?php if ($get_id>0){
    $rm="SELECT * FROM room WHERE id=$get_id ";
    $rmr=mysqli_query($con,$rm);
    if(mysqli_num_rows($rmr)==0){
      echo "NO ROOM EXIST.";
      }else {?>
    <div class="container p-2">
    <div class="row">
    <div class="col-sm-8 col-md-8" style="padding: 0px;">
     <?php 

               
                while($row=mysqli_fetch_array($rmr)){
                $rm_id=$row['id'];
                $host_id=$row['hostel_id'];
                $room_no=$row['room_no'];
                $a_seats=$row['a_seats'];
                $t_seats=$row['t_seats'];
                $image=$row['image'];
                $metrices=$row['metrices'];
                $washroom=$row['washroom'];
                $bed=$row['bed'];
                $fee=$row['fee'];}
         
?>
    <div class="demo">

    <ul id="lightSlider" style="list-style-type: none">
        <li>
            <img src="images/<?php echo $image; ?>"  alt="no image" style="width: 750; height: 480;"/>

        </li>  
    </ul> <!--Gallery End-->
        </div>
        
        <div class="col-sm-8 col-md-10" style="padding: 20px;">
        <text style="padding:2px 20px 2px 20px; color: #00adef;font-size: 20px; background-color: #dbf5ff; ">Exclusive </text> <text style="font-size:40px;padding: 20px; color: #647a85;">|  </text>
        <i class="fa fa-shower" style="font-size:20px;color: #808080;"></i>&nbsp Bathroom 
        &nbsp&nbsp<i class="fa fa-user-o" style="font-size:20px;color: #808080; "> </i>&nbsp <?php echo $t_seats; ?> Person 
        &nbsp
        <?php if($metrices==1){ echo"<i class='fa fa-inbox' style='font-size:20px;color: #808080;padding:10px'> </i>Metrices";}else{echo"<i class='fa fa-hotel' style='font-size:20px;color: #808080; padding:10px;'> </i>Bed";} ?></a>
        </div>
        <div class="clearfix"></div> 

        </div>

        <div class="col-sm-3 col-md-4" style="padding: 0px; margin-left: -10px;"><style>
       #map {
        height: 500px;
        width: 100%;
       }
    </style>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 33.632211, lng: 73.073567};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd5qFRPFPUrmAfFjh5cPwFV-QhB_UwAIk&callback=initMap">
    </script>
  
    
    </div><!--Image Gallery Start-->
    </div></div>
  <div class="main-sep"><img src="images/shadow.png" class="img-responsive" /></div>
  
  <div class="container p-2"><!--Small Populars Start-->
  
    <h1>Rules</h1>
    
    <div class="row">
    <?php 

              $host="SELECT * FROM hostel WHERE id=$host_id ";
                $qry=mysqli_query($con,$host);
                while($row=mysqli_fetch_array($qry)){
                $host_id=$row['id'];
                $rules=$row['rules'];
                ?>
       <div class="gallery-txt"><?php echo $rules; }?></div></div>
  
  </div><?php }?><!--Small Populars End-->
<?php } ?>
  <?php if ($get_p_id>0){ 
    $flt="SELECT * FROM flats WHERE p_id=$get_p_id";
    $rn=mysqli_query($con,$flt); 
    if (mysqli_num_rows($rn)==0){
      echo"NO ROOM EXIST.";
      }
      else {?>
    <div class="container p-2">
    <div class="row">
    <div class="col-sm-8 col-md-8" style="padding: 0px;">
     <?php 

              
                while($rw=mysqli_fetch_array($rn)){
                $flt_id=$rw['id'];
                $flt_name=$rw['name'];
                $flt_rooms=$rw['rooms'];
                $washrooms=$rw['washrooms'];
                $floor_level=$rw['floor_level'];
                $image_flt=$rw['image'];
                $rent=$rw['rent'];
                $furnished=$rw['furnished'];    
           }
         
?>
    <div class="demo">

    <ul id="lightSlider" style="list-style-type: none" >
        <li>
            <img src="images/<?php echo $image_flt; ?>"  alt="no image" style="width: 750px; height: 480px;" />

        </li>  
    </ul> <!--Gallery End-->
        </div>
        
        <div class="col-sm-8 col-md-10" style="padding: 20px;">
        <text style="padding:2px 20px 2px 20px; color: #00adef;font-size: 20px; background-color: #dbf5ff; ">Exclusive </text> <text style="font-size:40px;padding: 20px; color: #647a85;">|  </text>
        <i class="fa fa-shower" style="font-size:20px;color: #808080;"></i>&nbsp Bathroom : <?php echo $washrooms; ?>
        &nbsp&nbsp<i class="fa fa-building" style="font-size:20px;color: #808080; "> </i>&nbsp Floor: <?php echo $floor_level; ?>
        &nbsp <i class="fa fa-home" style="font-size:20px;color: #808080;"></i>&nbsp <?php echo $furnished; ?> : Furnished 
        </a>
        </div>
        <div class="clearfix"></div> 

        </div>

        <div class="col-sm-3 col-md-4" style="padding: 0px; margin-left: -10px;"><style>
       #map {
        height: 500px;
        width: 100%;
       }
    </style>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 33.632211, lng: 73.073567};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd5qFRPFPUrmAfFjh5cPwFV-QhB_UwAIk&callback=initMap">
    </script>
  
    
    </div><!--Image Gallery Start-->
    </div></div><?php }}?> <!--Newsletter Area End-->
 <?php include('includes/footer.php'); ?>