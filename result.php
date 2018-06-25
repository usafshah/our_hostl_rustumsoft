<?php include('includes/header.php'); 
$limit=10;
?>
    
  
  </div><!--Inner Pages Header End-->
  <style type="text/css">
  .usaf{
     pointer-events: none;cursor: default;opacity: 0.6;
  } 
</style> 

<!-- Search div -->
<script>
function hostel(abc){
val=abc.split(',');
if(val[1]==1){
  window.open('result.php?user_query='+val[0]+'&type=flats','_SELF');
}else{
window.open('result.php?user_query='+val[0],'_SELF');
}
  }
</script>

  <div class="container p-1"><!--Listing Started-->
  
        <div class="listing"><!--Listing Start-->
        <div class="search">
         <div class="col-md-4"><span>Search result for:&nbsp<?php echo $_GET['user_query']; ?></span></div>
         <div class="col-md-2">
          <select class="form-control" style="padding: 0px; margin-top:-20px;" onchange="hostel(this.value);">

            <option value="<?php echo $_GET['user_query']; ?>,0" selected="selected" >Hostel</option>
            <option value="<?php echo $_GET['user_query']; ?>,1" <?php echo (isset($_GET['type'])?'selected':''); ?>>Flats</option>
            </select>
      </div>
          
      
      <div class="clearfix"></div>
        </nav>
     </div>
 
         

        </div><!--Listing Start-->
         
        <nav aria-label="Page navigation">
         
        
      <div class="clearfix"></div>
        <?php 
          $user_search=$_GET['user_query'];
        if (!isset($_GET['type'])) {
/*pageination start*/
$total = "select * from hostel WHERE address LIKE '%$user_search%' OR keyword LIKE '%{$user_search}%' && hostel_type!=3  && status!=0";
$query=mysqli_query($con,$total);
$total=mysqli_num_rows($query);
$pages = ceil($total / $limit);
$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
$offset = ($page - 1)  * $limit;
$start = $offset + 1;
$end = min(($offset + $limit), $total);
$prevlink1 = ($page > 1) ?'<a href="?page=1&user_query=' .$user_search.'" title="First page">&laquo;</a>':'<a href="" class="usaf">&laquo;</a>';
$prevlink2 = ($page > 1) ? '<a href="?page=' . ($page - 1) .'&user_query=' .$user_search.'" title="Previous page">&lsaquo;</a>' : '<a href="" class="usaf">&lsaquo;</a>';
$nextlink = ($page < $pages) ? '<a href="?page=' . $pages .'&user_query=' .$user_search.'" title="Last page">&raquo;</a>' : '<a href="" class="usaf">&raquo;</a>';
$stmt1 = 'SELECT * FROM hostel WHERE address LIKE "%'.$user_search.'%" && hostel_type!=3  && status!=0 LIMIT '.$limit.' OFFSET '.$offset
    ;
        $stmt=mysqli_query($con,$stmt1);
        if(mysqli_num_rows($stmt)==0){
          echo "NO RESULT FOUND AGAINST YOUR SEARCH QUERY.";
        }
        else {
        while($row=mysqli_fetch_array($stmt)){
        $id=$row['id'];
        $name=$row['name'];
        $hostel_type=$row['hostel_type'];
        $total_rooms=$row['t_room'];
         $image=$row['image'];
?>
        

        
        <div class="list-item"><!--Result Start-->

          <div class="row">
          
            <div class="col-md-3"><img src="admin/images/<?php echo $image;?>" class="img-responsive" alt="img not found" /></div>
            
            <div class="col-md-9">
            
              <div class="search-title"><?php echo $name; ?></div>
              <!-- City Descriptionn -->
              <div class="search-desc">ISLAMABAD / PESHAWAR / LAHORE / KARACHI: 
              Dorms are places where you live away from your parents for the first time in your life and <?php $find_name ?>is on of the places you are looking for.</div>
             
              <!-- City Descriptionn End-->
              <div class="col-md-2 pkg-creds"><span class="small-title"><?php if($hostel_type==3){ ?>Type:<?php }?>For:</span> <?php if($hostel_type==1){ echo "Boys";}if($hostel_type==2){ echo "Gilrs";} if($hostel_type==3){ echo "Flat";}   ?></div>
              
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
     <?php  } }?><!-- end of else and whlie loof -->
  <?php 
  echo '<div id="paging"> <ul class="pagination">
    <li>'. $prevlink1. '</li>
    <li>'. $prevlink2. '</li>';
  echo ($page == 1) ?'<li><a href="result.php?page=1&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >1</a></li>':'<li><a href="result.php?page=1&user_query='.$_GET['user_query'].'" >1</a></li>';
  echo (2 <= $pages) ?($page == 2) ?'<li><a href="result.php?page=2&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >2</a></li>':'<li><a href="result.php?page=2&user_query='.$_GET['user_query'].'" >2</a></li>':'';
  echo (3 <= $pages) ?($page == 3) ?'<li><a href="result.php?page=3&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >3</a></li>':'<li><a href="result.php?page=3&user_query='.$_GET['user_query'].'" >3</a></li>':'';
  echo (4 <= $pages) ?($page == 4) ?'<li><a href="result.php?page=4&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >4</a></li>':'<li><a href="result.php?page=4&user_query='.$_GET['user_query'].'" >4</a></li>':'';
  echo (5 <= $pages) ?($page == 5) ?'<li><a href="result.php?page=5&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >5</a></li>':'<li><a href="result.php?page=5&user_query='.$_GET['user_query'].'" >5</a></li>':'';
  echo ($page < $pages) ? '<li><a href="?page=' . ($page + 1) .'&user_query='.$_GET['user_query'].' " title="Next page">&rsaquo;</a></li>' : '<li><a href="" class="usaf" >&rsaquo;</a></li>';
  echo '<li>'.$nextlink. '</li>
  </ul></div>';
/*pagination end*/   ?>
<?php }   ?>



<div class="clearfix"></div>
        <?php 
        if(isset($_GET['type'])){
        /*pageination start*/
        /*keyword for flats*/
         
$total = "select * from flats WHERE address LIKE '%$user_search%'  && status!=0";
$query=mysqli_query($con,$total);
$total=mysqli_num_rows($query);
$pages = ceil($total / $limit);
$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
$offset = ($page - 1)  * $limit;
$start = $offset + 1;
$end = min(($offset + $limit), $total);
$prevlink1 = ($page > 1) ?'<a href="?page=1&type=flats&user_query=' .$user_search.'" title="First page">&laquo;</a>':'<a href="" class="usaf">&laquo;</a>';
$prevlink2 = ($page > 1) ? '<a href="?page=' . ($page - 1) .'&type=flats&user_query=' .$user_search.'" title="Previous page">&lsaquo;</a>' : '<a href="" class="usaf">&lsaquo;</a>';
$nextlink = ($page < $pages) ? '<a href="?page=' . $pages .'&type=flats&user_query=' .$user_search.'" title="Last page">&raquo;</a>' : '<a href="" class="usaf">&raquo;</a>';
$stmt1 = 'SELECT * FROM flats WHERE address LIKE "%'.$user_search.'%"
 && status!=0 LIMIT '.$limit.' OFFSET '.$offset;
       $stmt=mysqli_query($con,$stmt1);
       if (mysqli_num_rows($stmt)==0) { echo "NO RESULT FOUND"; }
        while($row=mysqli_fetch_array($stmt)){
        $p_id=$row['p_id'];
        $flate_name=$row['name'];
        $floor_level=$row['floor_level'];
        $total_rooms=$row['rooms'];
        $rent=$row['rent'];
        $image=$row['image'];
?>
        
        
        <div class="list-item"><!--Result Start-->

          <div class="row">
          
            <div class="col-md-3"><img src="admin/images/<?php echo $image;?>" class="img-responsive" /></div>
            
            <div class="col-md-9">
            
              <div class="search-title"><?php echo $flate_name; ?></div>
              
              <div class="search-desc">ISLAMABAD / PESHAWAR / LAHORE / KARACHI: 
              Dorms are places where you live away from your parents for the first time in your life and <?php $find_name ?>is on of the places you are looking for.</div>
              
              <div class="clearfix"></div>
              <div class="col-md-2 pkg-creds"><span class="small-title">Type:</span>Flat</div>
              <div class="col-md-2 pkg-creds"><span class="small-title">Rooms:</span> <?php echo $floor_level;?></div>
              <div class="col-md-2 pkg-creds"><span class="small-title">Floor:</span> <?php echo $floor_level;?></div>
               <div class="col-md-2 pkg-creds"><span class="small-title">Rent:</span><?php echo $rent;?></div>
              
              <div class="col-md-3 col-md-offset-1"><a href="detail.php?p_id=<?php echo $p_id; ?>"><button type="submit" class="green-btn">View Details</button></a></div>
            
            </div>
          
          </div>
        
        </div><!--Result End-->
       
        <div class="listing-sep"></div>
    

        <div class="clearfix"></div>
     <?php } ?>
<?php    
  echo '<div id="paging"> <ul class="pagination">
    <li>'. $prevlink1. '</li>
    <li>'. $prevlink2. '</li>';
  echo ($page == 1) ?'<li><a href="result.php?page=1&type=flats&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >1</a></li>':'<li><a href="result.php?page=1&type=flats&user_query='.$_GET['user_query'].'" >1</a></li>';
  echo (2 <= $pages) ?($page == 2) ?'<li><a href="result.php?page=2&type=flats&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >2</a></li>':'<li><a href="result.php?page=2&type=flats&user_query='.$_GET['user_query'].'" >2</a></li>':'';
  echo (3 <= $pages) ?($page == 3) ?'<li><a href="result.php?page=3&type=flats&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >3</a></li>':'<li><a href="result.php?page=3&type=flats&user_query='.$_GET['user_query'].'" >3</a></li>':'';
  echo (4 <= $pages) ?($page == 4) ?'<li><a href="result.php?page=4&type=flats&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >4</a></li>':'<li><a href="result.php?page=4&type=flats&user_query='.$_GET['user_query'].'" >4</a></li>':'';
  echo (5 <= $pages) ?($page == 5) ?'<li><a href="result.php?page=5&type=flats&user_query='.$_GET['user_query'].'" style="cursor: default;background-color: #008000;" title="Current Page" >5</a></li>':'<li><a href="result.php?page=5&type=flats&user_query='.$_GET['user_query'].'" >5</a></li>':'';
  echo ($page < $pages) ? '<li><a href="?page=' . ($page + 1) .'&type=flats&user_query='.$_GET['user_query'].' " title="Next page">&rsaquo;</a></li>' : '<li><a href="" class="usaf" >&rsaquo;</a></li>';
  echo '<li>'.$nextlink. '</li>
  </ul></div>';
/*pagination end*/   ?>



  <?php    }   ?>
<!--Listing End-->
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