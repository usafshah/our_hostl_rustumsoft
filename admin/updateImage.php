        <?php include("include/db.php"); 
              include("include/header.php"); ?>
        <script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>

          <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
               
                  <div class="x_content">
                   
                     <form action="" method="post" enctype="multipart/form-data">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Hostel Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img src="images/<?php echo $row['image']; ?>" style="width: 80px; height: 80px;"><br>
                          <input type="file" name="updateImg" id="updateImg" title="Select Image To Update">
                        </div>
                      </div>
                      

                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="center">
                          
                          <button id="send" type="submit" name="update" class="btn btn-success">&nbsp;Update&nbsp;</button>
                          <button type="button" onclick="go()" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
                    </form>
<?php
  if(isset($_POST['update']))
  {
    $rand=rand(0000,9999);
    $image = $_FILES['updateImg']['name'];
    $image_tmp = $_FILES['updateImg']['tmp_name'];
    if(empty($image))
    {
      $image=$row['image'];
    }
    else
    {
    $image=$rand.$image;
    }
    $updateHostel="UPDATE `hostel` SET `image`='$image' WHERE `id`='$id'";
    $runUpdateHostel=mysqli_query($con, $updateHostel);
    if($runUpdateHostel)
    {
      move_uploaded_file($image_tmp, "images/$image");
      echo "<script>alert('Setting Successfully Updated...')</script>";
      echo "<script>window.open('setting.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Oops! Something goes wrong, Try again later...')</script>";
      echo "<script>window.open('setting.php','_self')</script>";
    }
  }
?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->
        <script>
         function go()
         {
          window.open('setting.php','_self');
         }
        </script>
        <!-- /page content -->
<?php include("include/footer.php"); ?>