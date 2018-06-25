<?php
session_start();
include("include/db.php");
$id=$_SESSION['id'];
  $name = $_REQUEST["name"];
  $value = $_REQUEST["val"];
  if(isset($name) && isset($value))
  {

    $updateField="UPDATE `hostel` SET `".$name."`='$value' WHERE `id`='$id'";
    $runUpdateField=mysqli_query($con, $updateField);
    if($runUpdateField)
    {
      if($name=='hostel_type' && $value==1)
        echo "Male";
      elseif ($name=='hostel_type' && $value==0) {
        # code...
        echo "Female";
      }
      if ($name!='hostel_type' && $value==1) {
        # code...
        echo "Yes";
      }
      elseif($name!='hostel_type' && $value==0 && empty($value))
      {
        echo "No";
      }
      else
      {
      echo $value;
      }
    }
   
  }

 ?>