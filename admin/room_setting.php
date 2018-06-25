              <?php include("include/db.php"); 
              include("include/header.php"); ?>
       <?php
      if (isset($_POST['update'])) {
       $image = $_FILES['image']['name'];
       if ($image!="") {
        
        $image_tmp = $_FILES['image']['tmp_name']; 
        move_uploaded_file($image_tmp,"images/$image");
        $query='Update room  set room_no="'.$_POST['name'].'",t_seats='.$_POST['seats'].',a_seats='.$_POST['a_seats'].',fee='.$_POST['fee'].',image="'.$image.'",washroom='.$_POST['wash_room'].',metrices='.$_POST['mattress'].',bed='.$_POST['beds'].' where id='.$_POST['rid'];
       }else{
         $query='Update room  set room_no="'.$_POST['name'].'",t_seats='.$_POST['seats'].',a_seats='.$_POST['a_seats'].',fee='.$_POST['fee'].',washroom='.$_POST['wash_room'].',metrices='.$_POST['mattress'].',bed='.$_POST['beds'].' where id='.$_POST['rid'];
       }
           mysqli_query($con,$query);
           echo '<script>window.open("rooms.php?msg=update", "_self");</script>';
           exit();
      }
      
       ?>
       <?php 
          $sql="select * from room where id=".$_GET['rid'];
          $result=mysqli_query($con,$sql);
          $row=mysqli_fetch_array($result);
        ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Room</h3>
              </div>

              <form method="post" action="rooms.php">
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
                <strong>Room ! </strong> Update Successfully.
              </div>  
            <?php } ?>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Room Detail<small></small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Room No: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php echo $row['room_no']; ?>" id="first-name" required="required" name="name" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input type="hidden" value="<?php echo $_GET['rid']; ?>" name="rid" class="form-control col-md-7 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Total Seats <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" value="<?php echo $row['t_seats']; ?>" name="seats" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Availible seats <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" value="<?php echo $row['a_seats']; ?>" class="form-control col-md-7 col-xs-12" type="text" required="required" name="a_seats">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Per Seat fee<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $row['fee']; ?>" name="fee">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Wash Room Attaged</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="wash_room" value="1" <?php echo ($row['washroom']==1 ? "checked":"" ); ?> > &nbsp; Yes &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="wash_room" value="0" <?php echo ($row['washroom']==0 ? "checked":""); ?> > No
                            </label>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mattress</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="mattress" value="1" <?php echo ($row['metrices']==1 ? "checked":"" ); ?> > &nbsp; Yes &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="mattress" value="0" <?php echo ($row['metrices']==0 ? "checked":"" ); ?> > No
                            </label>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Beds</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="beds" value="1" <?php echo ($row['bed']==1 ? "checked":"" ); ?> > &nbsp; Yes &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="beds" value="0"  <?php echo ($row['bed']==0 ? "checked":"" ); ?> > No
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Room Image 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="image" class="date-picker form-control col-md-7 col-xs-12" type="text">
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