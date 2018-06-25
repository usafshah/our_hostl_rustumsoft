<?php
include("include/db.php");
//$id=$_SESSION['id'];
  $value = $_REQUEST["val"];
  if(isset($value))
  {

    $select="SELECT * FROM `hostel` WHERE `password`='$value'";
    $runselect=mysqli_query($con, $select);
    $count=mysqli_num_rows($runselect);
    if($count==0)
    
      {
      echo "Incorrect Password";
      }
      else
      {
        echo "correct";
      }
    }
   
  

 ?>