<?php 
include('includes/db.php');
$marks=$_POST['marks'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$id=$_POST['test_id'];
$sql='INSERT INTO `user`(`id`, `name`, `email`, `phone`) VALUES (NULL,"'.$name.'","'.$email.'","'.$phone.'")';
$result=mysqli_query($db,$sql);
$sql="SELECT * FROM `category` WHERE cat_id=".$id;
$run=mysqli_query($db,$sql);
$row=mysqli_fetch_array($run);

 ?>
