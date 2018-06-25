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
                   
                     <form action="" method="post">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Hostel Rules
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="rules" id="text" class="form-control col-md-7 col-xs-12"><?php echo $row['rules']; ?></textarea>
                          <script>
                           CKEDITOR.replace( 'text' );
                          </script>
                        </div>
                      </div>
                      

                     
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                      <div class="form-group">
                        <div align="center">
                          
                          <button id="send" type="submit" name="update" class="btn btn-success">&nbsp;Update&nbsp;</button>
                          <button type="button" onclick="go()" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
                    </div>
                    </form>
<?php
  if(isset($_POST['update']))
  {
   
    $rules=$_POST['rules'];
    if(empty($rules)){ $rules=$row['rules']; }

    $updateHostel="UPDATE `hostel` SET `rules`='$rules' WHERE `id`='$id'";
    $runUpdateHostel=mysqli_query($con, $updateHostel);
    if($runUpdateHostel)
    {
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