              <?php include("include/db.php");
              include("include/header2.php"); 

               ?>
    <script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>

       <?php
      if (isset($_POST['update'])) {
       $image = $_FILES['image']['name'];
       if ($image!="") {
        $num=rand(0,100);
        $image=$num.$image;
        $image_tmp = $_FILES['image']['tmp_name']; 
        move_uploaded_file($image_tmp,"images/$image");
        $query='Update flats  set name="'.$_POST['name'].'",rooms="'.$_POST['rooms'].'",description="'.$_POST['desc'].'",rent='.$_POST['rent'].',washrooms='.$_POST['washrooms'].',security='.$_POST['security'].',address="'.$_POST['address'].'",floor_level="'.$_POST['floor_level'].'",furnished="'.$_POST['furnished'].'",location="'.$_POST['location'].'",image="'.$image.'" where id='.$_POST['rid'];
       }else{
         $query='Update flats  set name="'.$_POST['name'].'",rooms="'.$_POST['rooms'].'",description="'.$_POST['desc'].'",rent='.$_POST['rent'].',washrooms='.$_POST['washrooms'].',security='.$_POST['security'].',address="'.$_POST['address'].'",floor_level="'.$_POST['floor_level'].'",furnished="'.$_POST['furnished'].'",location="'.$_POST['location'].'" where id='.$_POST['rid'];
       }
           mysqli_query($con,$query);
          echo '<script>window.open("plots.php?msg=update", "_self");</script>';
           exit();
      }
      
       ?>
       <?php 
          $sql="select * from flats where id=".$_GET['rid'];
          $result=mysqli_query($con,$sql);
          $row=mysqli_fetch_array($result);
        ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Flat</h3>
              </div>

              <form method="post" action="plots.php">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for room...">
                    <span class="input-group-btn">
                      <button  class="btn btn-default" type="submit">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
</form>

            </div>

            <div class="clearfix"></div>
            <?php if (isset($msg)) { ?>
              <div class="alert alert-success">
                <strong>Flat ! </strong> Update Successfully.
              </div>  
            <?php } ?>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Flat Detail<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action=""  enctype="multipart/form-data" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Flat Name: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php echo $row['name']; ?>" id="first-name" required="required" name="name" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input type="hidden" value="<?php echo $_GET['rid']; ?>" name="rid" class="form-control col-md-7 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description: <span class="required">*</span>
                        </label>
                           <div class="col-md-9 col-sm-9 col-xs-12">
                           <textarea name="desc" id="text" class="form-control col-md-7 col-xs-12"><?php echo $row['description']; ?></textarea>
                          <script>
                           CKEDITOR.replace( 'text' );
                          </script>
                        </div>
                       
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rooms: <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" value="<?php echo $row['rooms']; ?>" class="form-control col-md-7 col-xs-12" type="text" required="required" name="rooms">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Wash Rooms</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $row['washrooms']; ?>" name="washrooms">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rent:<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $row['rent']; ?>" name="rent">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Security:<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $row['security']; ?>" name="security">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Floor Level:<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $row['floor_level']; ?>" name="floor_level">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Furnished:<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $row['furnished']; ?>" name="furnished">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address:<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $row['address']; ?>" name="address">
                        </div>
                      </div>

                     
                      
                   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Room Image 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="image" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Location<span class="required"></span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $row['location']; ?>" name="location" placeholder="Enter Google latitude and longitude e.g 33.632134, 73.073512">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
  <a href="index.php"><button class="btn btn-primary" type="button">Cancel</button></a>
<a href="add_room.php"><button class="btn btn-primary" type="reset">Reset</button></a>
                          <button type="submit" name="update" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
        <!-- /page content -->
<?php include("include/footer.php"); ?>