<?php 
include('includes/db.php');
error_reporting(0);
$limit = 10;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student acommodation | Come to your desired location | Book Hostle & Room::</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" /> 
<link rel="stylesheet" href="css/slider-style.css">
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" type="text/css" href="css/stickytooltip.css" />

<link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

<link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 

<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


</head>

<body>

  <!--Top Header Start--><div class="demo-inner-content" >
      
 
    
          <div class="container" >
 <div class="col-md-12 abc col-md-offset-0"><!--Main Menu Start-->
              
              <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
   <?php include_once 'includes/navbar.php'; ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
            
            </div> <!--Main Menu End--> 
      
  <?php 
  if (isset($_GET['loc'])) {
  if (isset($_GET['type'])) {
     $selectRoom="SELECT * FROM `flats` WHERE address LIKE '%".$_GET['loc']."%' && status!=0";
  }else{
    $selectRoom="SELECT * FROM `hostel` WHERE address LIKE '%".$_GET['loc']."%' AND hostel_type!=3 && status!=0";
  }             $runRoom=mysqli_query($con, $selectRoom);
                $count=mysqli_num_rows($runRoom);
                while($row=mysqli_fetch_array($runRoom)){
                 $name[]=$row['name'];
                 $id[]=$row['id'];
                 $loca=str_replace("(","",$row['location']);
                 $loc[]=str_replace(")","",$loca);
                    } ?>
<style> #map {
        height: 400px;
        width: 100%; }
</style>
    <?php if ($count!=0) { ?>
    <div id="map"></div> 
   <?php } ?>
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
    po=neighborhoods[0].split(",");
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: parseFloat(po[0]), lng: parseFloat(po[1])}
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

 <?php  }  ?>
 

          </div>
                  
                <div class="row"> </div>
              
              <br />
            
            </div>
          
          </div>
            
    </div>
        
  <!--Top Header End-->
<?php 

error_reporting(0);
$get=$_GET['loc'];
$isl="Islamabad is regarded as one of the most beautiful city in the entire globe and without any doubt, there are some outstanding things that you can never experience in any part of the world. From natural scenes to artificial galleries one can get almost everything in this unique city.";
$lhr="After getting through the rough times and letting the good times roll, lots of people said “Lahore chorne ka dil nai karta ab.”  Which I totally agree with and in reference to that I’d like to say: “Jine Lahore Nai Vekhya O Jamya-e-Nai.”";
$rwp="Rawalpindi commonly known as Pindi is a city in the Punjab province of Pakistan. Rawalpindi is adjacent to Pakistan's capital of Islamabad, and the two are jointly known as the twin cities on account strong social and economic links between the cities. Rawalpindi is the fourth-largest city in Pakistan by population, while the larger Islamabad Rawalpindi metropolitan area is the country's third-largest metropolitan area.";


?>
  

<?php if(!isset($find_name)) {?>
  <div class="container p-1"><!--Listing Started-->
<script>
function hostel(abc){
val=abc.split(',');
if(val[1]==1){
  window.open('listing.php?loc='+val[0]+'&type=flats','_SELF');
}else{
window.open('listing.php?loc='+val[0],'_SELF');
}
  }
  </script>
        <div class="listing"><!--Listing Start-->  
        <div class="search"> <div class="col-md-2"><span><?php echo $get; ?></span></div>

        <div class="col-md-2">
          <select class="form-control" style="padding: 0px; margin-top:-20px;" onchange="hostel(this.value);">

            <option value="<?php echo $get; ?>,0" selected="selected" >Hostel</option>
            <option value="<?php echo $get; ?>,1" <?php echo (isset($_GET['type'])?'selected':''); ?>>Flats</option>
            </select>
      </div>
      <div class="clearfix"></div> 
        </nav>
     </div>
 
<style type="text/css">
  .usaf{
     pointer-events: none;cursor: default;opacity: 0.6;
  } 
</style>         

        </div><!--simple hostel data Start -->
         
        <nav aria-label="Page navigation">
         
        
        <div class="clearfix"></div>
        <?php 
        
        if(isset($get) && $_GET['type']!='flats') {

/*pageination start*/
$total = "select * from hostel WHERE address LIKE '%$get%' && hostel_type!=3 && status!=0";
$query=mysqli_query($con,$total);
$total=mysqli_num_rows($query);
$pages = ceil($total / $limit);
$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
$offset = ($page - 1)  * $limit;
$start = $offset + 1;
$end = min(($offset + $limit), $total);
$prevlink1 = ($page > 1) ?'<a href="?page=1&loc=' .$get.'" title="First page">&laquo;</a>':'<a href="" class="usaf">&laquo;</a>';
$prevlink2 = ($page > 1) ? '<a href="?page=' . ($page - 1) .'&loc=' .$get.'" title="Previous page">&lsaquo;</a>' : '<a href="" class="usaf">&lsaquo;</a>';
$nextlink = ($page < $pages) ? '<a href="?page=' . $pages .'&loc=' .$get.'" title="Last page">&raquo;</a>' : '<a href="" class="usaf">&raquo;</a>';
$stmt1 = 'SELECT * FROM hostel WHERE address LIKE "%'.$get.'%" && hostel_type!=3  && status!=0 LIMIT '.$limit.' OFFSET '.$offset
    ;
$stmt=mysqli_query($con,$stmt1);
  if (mysqli_num_rows($stmt) > 0) {
   while($row=mysqli_fetch_array($stmt)){
    
        $name1=$row['name'];
        $id=$row['id'];
        $name=$row['name'];
        $hostel_type=$row['hostel_type'];
        $total_rooms=$row['t_room'];
        $image=$row['image'];
?> 
        <div class="list-item"><!--Result Start-->

          <div class="row">
          
            <div class="col-md-3"><img src="admin/images/<?php echo $image;?>" class="img-responsive" /></div>
            
            <div class="col-md-9">
            
              <div class="search-title"><?php echo $name; ?></div>
              <!-- City Descriptionn -->
              <div class="search-desc"><?php if($get=='Islamabad') {
              echo $isl; }?></div>
              <div class="search-desc"><?php if($get=='Rawalpindi') {
              echo $rwp; }?></div>              
              <div class="clearfix">
                <div class="search-desc"><?php if($get=='Lahore') {
              echo $lhr; }?></div>
              </div>
              <!-- City Descriptionn End-->
              <div class="col-md-2 pkg-creds"><span class="small-title">For:</span> <?php if($hostel_type==1){ echo "Boys";}if($hostel_type==0){ echo "Gilrs";} if($hostel_type==3){ echo "Flat";}   ?></div>
              
              <div class="col-md-2 pkg-creds"><span class="small-title">Rooms:</span><?php echo $total_rooms;?></div>
              
              <div class="col-md-4 pkg-creds"><span class="small-title">Available Seats:</span><?php
              $count=0;
              $sum=0;
                $rm="SELECT * FROM room WHERE hostel_id=$id ";
                $rmr=mysqli_query($con,$rm);
                while($row=mysqli_fetch_array($rmr)){
                $rm_id=$row['id'];
                $t_seats=$row['t_seats'];
                $a_seats=$row['a_seats'];
                $count=$t_seats-$a_seats;
                $sum=$sum+$count;
               }
               echo $sum;?></div>
              
              <div class="col-md-3 col-md-offset-1"><a href="detail.php?id=<?php echo $id; ?>"><button type="submit" class="green-btn">View Details</button></a></div>
            
            </div>
          
          </div>
        
        </div><!--Result End-->
       
        <div class="listing-sep"></div>
    

        <div class="clearfix"></div>
     <?php }  /*end of while loop*/
    }else{
        echo "No result found";
    }

  echo '<div id="paging"> <ul class="pagination">
    <li>'. $prevlink1. '</li>
    <li>'. $prevlink2. '</li>';
  echo ($page == 1) ?'<li><a href="listing.php?page=1&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >1</a></li>':'<li><a href="listing.php?page=1&loc='.$_GET['loc'].'" >1</a></li>';
  echo (2 <= $pages) ?($page == 2) ?'<li><a href="listing.php?page=2&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >2</a></li>':'<li><a href="listing.php?page=2&loc='.$_GET['loc'].'" >2</a></li>':'';
  echo (3 <= $pages) ?($page == 3) ?'<li><a href="listing.php?page=3&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >3</a></li>':'<li><a href="listing.php?page=3&loc='.$_GET['loc'].'" >3</a></li>':'';
  echo (4 <= $pages) ?($page == 4) ?'<li><a href="listing.php?page=4&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >4</a></li>':'<li><a href="listing.php?page=4&loc='.$_GET['loc'].'" >4</a></li>':'';
  echo (5 <= $pages) ?($page == 5) ?'<li><a href="listing.php?page=5&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >5</a></li>':'<li><a href="listing.php?page=5&loc='.$_GET['loc'].'" >5</a></li>':'';
  echo ($page < $pages) ? '<li><a href="?page=' . ($page + 1) .'&loc=' .$get.' " title="Next page">&rsaquo;</a></li>' : '<li><a href="" class="usaf" >&rsaquo;</a></li>';
  echo '<li>'.$nextlink. '</li>
  </ul></div>';
/*pagination end*/   ?>
       
   <?php  } ?>
<!-- end of hostel if condition -->


<div class="clearfix"></div>
        <?php 
        /*flat start*/
        if(isset($get) && $_GET['type']=='flats') {
       /*pageination start*/
$total = "SELECT * FROM flats WHERE address LIKE '%$get%'  && status!=0";
$query=mysqli_query($con,$total);
$total=mysqli_num_rows($query);
$pages = ceil($total / $limit);
$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
$offset = ($page - 1)  * $limit;
$start = $offset + 1;
$end = min(($offset + $limit), $total);
$prevlink1 = ($page > 1) ?'<a href="?page=1&loc=' .$get.'" title="First page">&laquo;</a>':'<a href="" class="usaf">&laquo;</a>';
$prevlink2 = ($page > 1) ? '<a href="?page=' . ($page - 1) .'&loc=' .$get.'" title="Previous page">&lsaquo;</a>' : '<a href="" class="usaf">&lsaquo;</a>';
$nextlink = ($page < $pages) ? '<a href="?page=' . $pages .'&loc=' .$get.'" title="Last page">&raquo;</a>' : '<a href="" class="usaf">&raquo;</a>';
$stmt1 = 'SELECT * FROM flats WHERE address LIKE "%'.$get.'%"  && status!=0 LIMIT '.$limit.' OFFSET '.$offset;
$stmt=mysqli_query($con,$stmt1);
  if (mysqli_num_rows($stmt) > 0) {
   while($row=mysqli_fetch_array($stmt)){
        $id=$row['id'];
        $flate_name=$row['name'];
        $floor_level=$row['floor_level'];
        $total_rooms=$row['rooms'];
        $rent=$row['rent'];
        $image=$row['image'];
?>
        
        
        <div class="list-item"><!--Result Start-->

          <div class="row">
          
            <div class="col-md-3"><img src="admin/images/rooms/<?php echo $image;?>" class="img-responsive" /></div>
            
            <div class="col-md-9">
            
              <div class="search-title"><?php echo $flate_name; ?></div>
              
              <div class="search-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              
              <div class="clearfix"></div>
              <div class="col-md-2 pkg-creds"><span class="small-title">Rooms:</span><?php echo $total_rooms;?></div>
              <div class="col-md-2 pkg-creds"><span class="small-title">Floor:</span> <?php echo $floor_level;?></div>
               <div class="col-md-4 pkg-creds"><span class="small-title">Rent:</span><?php echo $rent;?></div>
              
              <div class="col-md-3 col-md-offset-1"><a href="detail.php?p_id=<?php echo $id; ?>"><button type="submit" class="green-btn">View Details</button></a></div>
            
            </div>
          
          </div>
        
        </div><!--Result End-->
       
        <div class="listing-sep"></div>
    

        <div class="clearfix"></div>
<?php } }else{ echo "No Flats Found in this area!"; }  

echo '<div id="paging"> <ul class="pagination">';
   
echo ($page > 1) ?'<li><a href="?page=1&type=flats&loc=' .$get.'" title="First page">&laquo;</a></li>':'<li><a href="" class="usaf">&laquo;</a></li>';
echo  ($page > 1) ? '<li><a href="?page=' . ($page - 1) .'&type=flats&loc=' .$get.'" title="Previous page">&lsaquo;</a></li>' : '<li><a href="" class="usaf">&lsaquo;</a></li>';
 echo ($page == 1) ?'<li><a href="listing.php?page=1&type=flats&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >1</a></li>':'<li><a href="listing.php?page=1&type=flats&loc='.$_GET['loc'].'" >1</a></li>';
  echo (2 <= $pages) ?($page == 2) ?'<li><a href="listing.php?page=2&type=flats&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >2</a></li>':'<li><a href="listing.php?page=2&type=flats&loc='.$_GET['loc'].'" >2</a></li>':'';
  echo (3 <= $pages) ?($page == 3) ?'<li><a href="listing.php?page=3&type=flats&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >3</a></li>':'<li><a href="listing.php?page=3&type=flats&loc='.$_GET['loc'].'" >3</a></li>':'';
  echo (4 <= $pages) ?($page == 4) ?'<li><a href="listing.php?page=4&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >4</a></li>':'<li><a href="listing.php?page=4&type=flats&loc='.$_GET['loc'].'" >4</a></li>':'';
  echo (5 <= $pages) ?($page == 5) ?'<li><a href="listing.php?page=5&type=flats&loc='.$_GET['loc'].'" style="cursor: default;background-color: #008000;" title="Current Page" >5</a></li>':'<li><a href="listing.php?page=5&type=flats&loc='.$_GET['loc'].'" >5</a></li>':'';
  echo ($page < $pages) ? '<li><a href="?page=' . ($page + 1) .'&type=flats&loc=' .$get.' " title="Next page">&rsaquo;</a></li>' : '<li><a href="" class="usaf" >&rsaquo;</a></li>';
  echo ($page < $pages) ? '<li><a href="?page=' . $pages .'&type=flats&loc=' .$get.'" title="Last page">&raquo;</a></li>' : '<li><a href="" class="usaf">&raquo;</a></li>';
 echo '</ul></div>';
/*pagination end*/   ?>
   
    <?php }  ?><!-- end of if loop for flat -->
    <?php } ?><!-- outer if for not search -->


  </div><!--Listing End-->
  
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
    
   <?php include('includes/footer.php'); ?>