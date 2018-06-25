<?php include('includes/main.php'); 
?>
    
    <div class="container p-1"><!--Packages Start-->
    
      <div class="row">
      
        <div class="col-md-12">
        
          <h1>Cities</h1>
        
        </div>
      
      </div>
      
      <div class="row">
      
        <div class="col-md-4">
        
          <div class="pkg-thumb">
            <img src="images/img01.png" alt="Avatar" class="image"><div class="caption" style="padding: 10px;">Islamabad</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big">----Islamabad----</span><br /><a href="#"></a>| <a href="listing.php?loc=Islamabad">Detail</a>    |    <a href="#"></a></div>
            </div>
          </div>
        
        </div>
        
        <div class="col-md-4">
        
          <div class="pkg-thumb">
            <img src="images/img02.jpg" alt="Avatar" class="image"><div class="caption" style="padding: 10px;">Rawalpindi</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big">----Rawalpindi----</span><br /><a href="#"></a>| <a href="listing.php?loc=Rawalpindi">Detail</a>    |    <a href="#"></a></div>
            </div>
          </div>
        
        </div>
        
        <div class="col-md-4">
        
          <div class="pkg-thumb">
            <img src="images/img03.png" alt="Avatar" class="image"><div class="caption" style="padding: 10px;">Lahore</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big">-------Lahore-------</span><br /><a href="#"></a> | <a href="listing.php?loc=Lahore">Detail</a>    |    <a href="#"></a></div>
            </div>
          </div>
        
        </div>
      
      </div>
      
      <div class="row">
      
        <div class="col-md-4">
        
          <div class="pkg-thumb">
            <img src="images/img04.png" alt="Avatar" class="image"><div class="caption" style="padding: 10px;">Coming Soon..</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big">Winter Packages</span><br /><a href="#">Guide</a>    |    <a href="#">Detail</a>    |    <a href="#">Price</a></div>
            </div>
          </div>
        
        </div>
        
        <div class="col-md-4">
        
          <div class="pkg-thumb">
            <img src="images/img05.png" alt="Avatar" class="image"><div class="caption" style="padding: 10px;">Coming Soon..</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big">Winter Packages</span><br /><a href="#">Guide</a>    |    <a href="#">Detail</a>    |    <a href="#">Price</a></div>
            </div>
          </div>
        
        </div>
        
        <div class="col-md-4">
        
          <div class="pkg-thumb">
            <img src="images/img06.png" alt="Avatar" class="image"><div class="caption" style="padding: 10px;">Coming Soon..</div>
            <div class="overlay">
              <div class="text"><img src="images/hover-logo.png"><br /><span class="title-big">Winter Packages</span><br /><a href="#">Guide</a>    |    <a href="#">Detail</a>    |    <a href="#">Price</a></div>
            </div>
          </div>
        
        </div>
      
      </div>
    
    </div><!--Packages End-->
    
    <div class="main-sep"><img src="images/shadow.png" class="img-responsive" /></div>
    
    <div class="container p-2"><!--Newsletter Area Started-->
    
      <div class="row">
      
        <div class="col-md-4">
        
          <h1>Find a Hostel/Flat</h1>
          <form action="listing2.php" method="post">
          <select class="form-control" id='province' name='province'>
        <option value="0">--Select Province--</option>
        <?php echo $query='select * from province';
        $res=mysqli_query($con,$query);
        while ($row1=mysqli_fetch_array($res)) {
          ?>
        <option  value="<?php echo $row1['id']; ?>"><?php echo $row1['name'];  ?></option>
        <?php   }?>
      </select>
                    
           <select class="form-control" id='district' name='district'>
            <option value="" selected="selected">District</option>
          </select> 
          
          <button type="submit" name="find" class="red-btn">Submit</button>
        </form>
        </div>
        
        <div class="col-md-4">
        
          <div class="ads">Advertisement Here</div>
        
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
    
    <div class="container p-2"><!--Testimonials Area Started-->
    
      <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
		<div class="testimonial4_header">
		</div>

		<ol class="carousel-indicators">
			<li data-target="#testimonial4" data-slide-to="0" class="active"></li>
			<li data-target="#testimonial4" data-slide-to="1"></li>
			<li data-target="#testimonial4" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
     <?php  $selecthostel="SELECT * FROM `hostel` WHERE hostel_type!=3";
            $runhostel=mysqli_query($con, $selecthostel);
           $count=0;
                while($row=mysqli_fetch_array($runhostel)){
                  $count++;
                 $id=$row['id'];
                 $name=$row['name'];
                 $address=$row['address'];
                $image=$row['image'];

                  if($count==1){  ?>
   
<div class="item active">
  <div class="testimonial4_slide" style="background-image: url('admin/images/<?php echo $image; ?>');">
          <h4><?php echo $name; ?></h4>
                    <h5><?php echo $address; ?></h5>
            </div>
      </div>
                 <?php   } else{ ?>

<div class="item" style="background-image: url('admin/images/<?php echo $image; ?>');">
        <div class="testimonial4_slide">
          <h4><?php echo $name; ?></h4>
                    <h5><?php echo $address; ?></h5>
            </div>
      </div>
              <?php    } ?>
			

		<?php } ?>
		</div>
		<a class="left carousel-control" href="#testimonial4" role="button" data-slide="prev">
			<span class="fa fa-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#testimonial4" role="button" data-slide="next">
			<span class="fa fa-chevron-right"></span>
		</a>
	</div>
    
    </div><!--Testimonials Area End--> 
    
    <?php include('includes/footer.php'); ?>
