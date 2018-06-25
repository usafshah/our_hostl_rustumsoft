<?php include("include/db.php"); 
              include("include/header2.php");
 ?>
    <script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>
       <?php
      if (isset($_POST['add'])) {
        $num=rand(0,1000);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image=$num.$image; 
        move_uploaded_file($image_tmp,"images/$image");
       $query='INSERT INTO `flats`(`id`, `p_id`, `name`, `rooms`, `washrooms`, `image`, `rent`, `security`, `address`, `floor_level`, `furnished`, `description`,location) VALUES (NULL,'.$id.',"'.$_POST['name'].'",'.$_POST['rooms'].','.$_POST['washroom'].',"'.$image.'","'.$_POST['rent'].'",'.$_POST['security'].',"'.$_POST['address'].'",'.$_POST['floor_level'].',"'.$_POST['furnished'].'","'.$_POST['desc'].'","'.$_POST['location'].'")';
           mysqli_query($con,$query);
           $msg='done';
      }
      
       ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Flat</h3>
              </div>

             <form method="post" action="plots.php">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for flat...">
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
                <strong>Flat ! </strong> Added Successfully.
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="add_plots.php"  enctype="multipart/form-data" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Flat Name: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="name" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Flat Description: <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <textarea name="desc" id="text" class="form-control col-md-7 col-xs-12"></textarea>
                          <script>
                           CKEDITOR.replace( 'text' );
                          </script>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Total Rooms <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="rooms" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Washrooms <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" name="washroom">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rent<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" name="rent">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Security Fee:<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" name="security">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Floor Level:<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" name="floor_level">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" name="address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Furnished<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" name="furnished">
                        </div>
                      </div>
                    
                     
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Room Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="image" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Location<span class="required"></span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="location" placeholder="Enter Google latitude and longitude e.g 33.632134, 73.073512">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
  <a href="index.php"><button class="btn btn-primary" type="button">Cancel</button></a>
<a href="add_room.php"><button class="btn btn-primary" type="reset">Reset</button></a>
                          <button type="submit" name="add" class="btn btn-success">Submit</button>
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