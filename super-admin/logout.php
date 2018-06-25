<?php
session_start();
$_SESSION['id']="";
session_destroy();

echo "<script>window.open('login.php','_self')</script>";
?>