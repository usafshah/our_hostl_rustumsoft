<?php   
include("include/db.php"); 
if (isset($_GET['id'])) {
$id=$_GET['id'];
$query="delete from hostel where id=$id";
 $result=mysqli_query($con,$query);
 if ($result) {
 	echo "<script>window.open('all_hostels.php','_SELF')</script>";
 }
}
elseif (isset($_GET['pid'])) {
$id=$_GET['pid'];
$query="delete from flats where id=$id";
 $result=mysqli_query($con,$query);
 if ($result) {
 	echo "<script>window.open('all_flats.php','_SELF')</script>";
 }
}

?>