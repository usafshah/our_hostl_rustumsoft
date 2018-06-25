<?php 
              include("include/db.php"); 
              if (isset($_POST['on_id'])) {  
              $update="UPDATE flats SET status=1 WHERE id=".$_POST['on_id'];
          }else{
              $update="UPDATE flats SET status=0 WHERE id=".$_POST['off_id'];
          }
              $qry=mysqli_query($con,$update);
              echo "<script>windows.open('hostel-detail.php','_self')</script>";
            ?>