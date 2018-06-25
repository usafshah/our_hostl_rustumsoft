<?php session_start();
include("include/db.php");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php if (isset($_GET['msg'])) { ?>
              <div class="alert alert-success">
                <strong>Congratulation!</strong> Registration Successfull...
              </div>  
            <?php } ?>
            <form method="post" action="login.php">
              <h1>Login Form</h1>
              <div>

                <input type="text" class="form-control" name='email' placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="pass" placeholder="Password" required="" />
              </div>
               <style>
              #info{
                display: none;
              }
             
            </style>
              <div id='info' class="alert alert-danger" >
               Email or Password Incorrect! Try Again...
              </div>
              <div>
              <button type="submit" name="login" class="btn btn-default submit" >Log in</button>
              
                <a href="lostPassword.php"  class="reset_pass">Lost your password?</a>
            
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="register.php" class="to_register"> Create account </a>
                </p>

                <div class="clearfix"></div>
                <br />

               
              </div>
            </form>
          </section>
        </div>
        <?php
        if(isset($_POST['login']))
        {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $query="SELECT * FROM `hostel` WHERE `email`='$email' AND `password`='$pass'";
        $run=mysqli_query($con, $query);
        $check=mysqli_num_rows($run);
        if($check>0){
          $row=mysqli_fetch_array($run);
          $id=$row['id'];
          $_SESSION['id']=$id; 
          if ($row['hostel_type']==3) {
            echo "<script>window.open('index2.php','_self')</script>";
            exit();
          }else{
        echo "<script>window.open('index.php','_self')</script>";
        exit();
        }
        }
        else
        {
          echo "<script>document.getElementById('info').style.display='block'</script>";
        }
          
        }
        ?>

      </div>
    </div>
  </body>
</html>
