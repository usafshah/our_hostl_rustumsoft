<?php 

include('includes/header.php');
error_reporting(0);
$get_id=$_GET['id'];
$get_p_id=$_GET['p_id'];

?> 
  <?php if(isset($get_id)){ ?>
  
  <div class="container">
    <div class="row">
    <div class="col-sm-8 col-md-8" style="padding: 0px;">
    <?php 
       $rm="SELECT * FROM room WHERE hostel_id=$get_id ";
                $rmr=mysqli_query($con,$rm);
                  if(mysqli_num_rows($rmr)==0){
        echo "<h4><center>No Data Available Of This Hostel,Check Back Later. <center>";
       }
                while($row=mysqli_fetch_array($rmr)){
                $rm_id=$row['id'];
                $room_no=$row['room_no'];
                $a_seats=$row['a_seats'];
                $image=$row['image'];
                $metrices=$row['metrices'];
                $washroom=$row['washroom'];
                $bed=$row['bed'];
                $fee=$row['fee'];
               
?>

<a href="roomdetail.php?id=<?php echo $rm_id; ?>" class="zoom" >
  
        <div class="col-sm-6 col-md-6" style="padding: 0px;">
            <div class="room" >
                <div class="room-img-content">
                    <img src="images/<?php echo $image; ?>" class="img-responsive"  >
                    <span class="room-title"><b>Room No:<?php echo $room_no; ?></b><br />
                        <b><i class="fa fa-exclamation-circle"></i><?php echo $a_seats; ?> Seats Left</b></span>
                </div>
                <div class="room-content">
                    <div class="roomproperties"><b><a href="" data-toggle="modal" data-target="#room_facilities">Room Facilities</a></b><br>
                     <b>Attach Bath:<?php if($washroom==1){ echo"<text style='color:green;'>Yes</text>";}else{echo"<text style='color:Red;'>No</text>";} ?></b><br>
                     <?php if($bed==0){?><b>Metrices:<?php if($metrices==1){ echo"<text style='color:green;'>Yes</text>";}else{echo"<text style='color:Red;'>No</text>";} }else{echo"<b>Bed:<text style='color:green;'>Yes</text></b>";}?>
                      </b>
                        
                    </div><div class="row room_cost_total">
                            
                            <div >
                                <h5 style="margin-top: -67px; margin-left: 195px;">Rs:<?php echo $fee; ?> <text style='font-size: 10px;'>Per Seat</text></h5>
                            </div>
                      
                        
                        </div>
                    
                    
                </div>
            </div>
        </div></a><?php }?>
       
</div>
<div class="col-sm-3 col-md-4" style="padding: 0px; margin-left: -10px;"><style>
       #map {
        height: 400px;
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
    <div class="col-sm-12 col-md-12">
            <h4>Hostel Contact Details</h4>

            <?php
            if(isset($_POST['modalbtn'])){ 
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $slct="SELECT * FROM user where email='$email'";
            $rselct=mysqli_query($con,$slct);
            if(mysqli_num_rows($rselct)==0){

            $sql='INSERT INTO `user`(`id`, `name`, `email`, `phone`) VALUES (NULL,"'.$name.'","'.$email.'","'.$phone.'")';
            $result=mysqli_query($con,$sql);

}
            if ($rselct){
              $host="SELECT * FROM hostel WHERE id=$get_id";
              $rnh=mysqli_query($con,$host);
              $roh=mysqli_fetch_array($rnh);
              echo "Address: ".$roh['address'];
              echo"<br>";
              echo "PHONE: ".$roh['phone_no'];
            
            }}
            else{
 ?>
          <center><button type="button" onclick="submit()" class="blue-btn" style="margin-top: -40px;">Show Contact</button></center><?php }
 ?>
        </div>
       </div>
       
    </div>
   
   </div>   
  <div class="main-sep">
  <div style="padding:3px; "></div><img src="images/shadow.png" class="img-responsive" /></div>
  <div class="clearfix"></div><?php } ?>
    <!-- flats data start -->
<?php if(isset($get_p_id)){ ?>
    <div class="container">
    <div class="row">
    <div class="col-sm-8 col-md-8" style="padding: 0px;">
    <?php 
       $qry="SELECT * FROM flats WHERE p_id=$get_p_id ";
                 $rn=mysqli_query($con,$qry);
                 if(mysqli_num_rows($rn)==0){
        echo "<h4><center>No Data Available Of This Flat,Check Back Later. <center>";
       }
         
        while($rw=mysqli_fetch_array($rn)){
                $flt_id=$rw['id'];
                $flt_name=$rw['name'];
                $flt_rooms=$rw['rooms'];
                $washrooms=$rw['washrooms'];
                $floor_level=$rw['floor_level'];
                $image_flt=$rw['image'];
                $rent=$rw['rent'];
                $furnished=$rw['furnished'];  
?>

<a href="roomdetail.php?p_id=<?php echo $flt_id; ?>" class="zoom" >
  
        <div class="col-sm-6 col-md-6" style="padding: 0px;">
            <div class="room" >
                <div class="room-img-content">
                    <img src="images/<?php echo $image_flt; ?>" class="img-responsive"  >
                    <span class="room-title"><b>Flat:<?php echo $flt_name; ?></b><br />
                        <!-- <b><i class="fa fa-exclamation-circle"></i><?php //echo $a_seats; ?> Seats Left</b> --></span>
                </div>
                <div class="room-content">
                    <div class="roomproperties"><b><a href="" data-toggle="modal" data-target="#room_facilities">Flat Facilities</a></b><br>
                     <b>Washrooms:<?php  echo $washrooms; ?></b><br>
                     <b>Floor:<?php echo $floor_level;?></b><br>
                     

                      </b>
                        
                    </div><div class="row room_cost_total">
                            
                            <div >
                                <h5 style="margin-top: -67px; margin-left: 195px;">Rs:<?php echo $rent; ?> <text style='font-size: 10px;'>Full</text></h5>
                            </div>
                      
                        
                        </div>
                    
                    
                </div>
            </div>
        </div></a><?php }?>
       
</div>
<div class="col-sm-3 col-md-4" style="padding: 0px; margin-left: -10px;"><style>
       #map {
        height: 400px;
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
        <div class="col-sm-12 col-md-12">
            <h4>Flat Contact Details</h4>

            <?php
            if(isset($_POST['modalbtn'])){ 
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
           $slct="SELECT * FROM user where email='$email'";
            $rselct=mysqli_query($con,$slct);
            if(mysqli_num_rows($rselct)==0){

            $sql='INSERT INTO `user`(`id`, `name`, `email`, `phone`) VALUES (NULL,"'.$name.'","'.$email.'","'.$phone.'")';
            $result=mysqli_query($con,$sql);
}
            if ($rselct){
              $host="SELECT * FROM hostel WHERE hostel_type=3";
              $rnh=mysqli_query($con,$host);
              $roh=mysqli_fetch_array($rnh);
              echo "Address: ".$roh['address'];
              echo"<br>";
              echo "PHONE: ".$roh['phone_no'];
            
            }}
            else{
 ?>
          <center><button type="button" onclick="submit()" class="blue-btn" style="margin-top: -40px;">Show Contact</button></center><?php }
 ?>
        </div>

       </div>

       
    </div><div style="padding:3px; "></div>
   <img src="images/shadow.png" class="img-responsive" /></div>
  
   </div>   
<?php } ?>
    <!-- flats data End -->
    <div class="p-1"></div> 
    <!-- modal for contact -->

 <div class="modal fade" id="myModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="" method="POST">
      <div class="modal-header">
        <h5 class="modal-title">Please enter the information to countinue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" id="marks2" name="marks" class="form-control" >
      <input type="hidden" name="test_id" class="form-control" value="<?php echo $_GET['id']; ?>" >
      <div class="modal-body">
        <p>Name:<input type="text"  name="name" class="form-control" ></p>
        <p>Email:<input type="text"  name="email" class="form-control" ></p>
        <p>Phone No:<input type="text"  name="phone" class="form-control" ></p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="modalbtn">Submit</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<!-- end modal -->
  <div class="container p-2"><!--Small Populars Start-->
  
    <h1>Popular Packages</h1>
    
    <div class="row">
    
      <div class="col-md-3">
      
        <div class="pkg-thumb">
            <img src="images/img05.png" alt="Avatar" class="image"><div class="caption">Winter Packages</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big-2">Winter Packages</span><br /><a href="#">Guide</a>    |    <a href="#">Detail</a>    |    <a href="#">Price</a></div>
            </div>
          </div>
      
      </div>
      
      <div class="col-md-3">
      
        <div class="pkg-thumb">
            <img src="images/img05.png" alt="Avatar" class="image"><div class="caption">Winter Packages</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big-2">Winter Packages</span><br /><a href="#">Guide</a>    |    <a href="#">Detail</a>    |    <a href="#">Price</a></div>
            </div>
          </div>
      
      </div>
      
      <div class="col-md-3">
      
        <div class="pkg-thumb">
            <img src="images/img05.png" alt="Avatar" class="image"><div class="caption">Winter Packages</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big-2">Winter Packages</span><br /><a href="#">Guide</a>    |    <a href="#">Detail</a>    |    <a href="#">Price</a></div>
            </div>
          </div>
      
      </div>
      
      <div class="col-md-3">
      
        <div class="pkg-thumb">
            <img src="images/img05.png" alt="Avatar" class="image"><div class="caption">Winter Packages</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big-2">Winter Packages</span><br /><a href="#">Guide</a>    |    <a href="#">Detail</a>    |    <a href="#">Price</a></div>
            </div>
          </div>
      
      </div>
    
    </div>
  
  </div><!--Small Populars End-->
  
  <div class="main-sep"><img src="images/shadow.png" class="img-responsive" /></div>
    
    <div class="container p-2"><!--Newsletter Area Started-->
    
      <div class="row">
      
        <div class="col-md-4">
        
          <h1>Find a Hotel</h1>
          
          <select class="form-control" id="exampleSelect1" style="width:100%">
            <option value="" selected="selected">Destination</option>
            <option value="01" >01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
          </select>
                    
          <select class="form-control" id="exampleSelect1" style="width:100%">
            <option value="" selected="selected">Hotel List</option>
            <option value="01" >01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
          </select> 
          
          <button type="button" class="red-btn">Submit</button>
        
        </div>
        
        <div class="col-md-4">
        
          <h1>Tourism Investment</h1>
          
          <input name="" type="text" class="form-control" placeholder="Your Name">
          
          <input name="" type="text" class="form-control" placeholder="Your Email">

          <button type="button" class="green-btn">Subscribe</button>
        
        </div>
        
        <div class="col-md-4">
        
          <h1>Subscribe to Our Newsletter</h1>
          
          <p>Subscribe us to get latest updates on all our
packages & Promotions.</p>

<input name="" type="text" class="form-control" placeholder="Your Email">

<button type="button" class="blue-btn">Subscribe</button>
        
        </div>
      
      </div>
    
    </div><!--Newsletter Area End-->
    
    <div class="main-sep"><img src="images/shadow.png" class="img-responsive" /></div>
    
    <div class="container p-2"><!--Investment Area Started-->
    
      <div class="row">
      
        <div class="col-md-4">
        
          <div class="ads">Advertisement Here</div>
        
        </div>
        
        <div class="col-md-8">
        
          <div class="ads-2">Advertisement Here</div>
        
        </div>
      
      </div>
    
    </div><!--Investment Area End--> 
      <script type="text/javascript">
    function submit(){
  $('#myModal').modal('show');
}
</script>
    <?php include('includes/footer.php'); ?>
  

 