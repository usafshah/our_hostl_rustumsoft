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

    <title>Global Hostel Management | </title>

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

    <style>
      #toast {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast #img{
  width: 50px;
  height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color: #111;
    color: #fff;
}
#toast #desc{

    
    color: #fff;
   
    padding: 16px;
    
    overflow: hidden;
  white-space: nowrap;
}

#toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes expand {
    from {min-width: 50px} 
    to {min-width: 350px}
}

@keyframes expand {
    from {min-width: 50px}
    to {min-width: 350px}
}
@-webkit-keyframes stay {
    from {min-width: 350px} 
    to {min-width: 350px}
}

@keyframes stay {
    from {min-width: 350px}
    to {min-width: 350px}
}
@-webkit-keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 60px; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 60px; opacity: 0;}
}
    </style>

<script>
  function launch_toast() {
    alert("os warka dung...");
   
}
</script>

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="lostPassword.php">
              <h1>Reset Password</h1>
              <div>
                <input type="text" class="form-control" name='email' placeholder="Enter Your Register Email" required="" />
              </div>
             
               <style>
              #info, #info2, #info3{
                display: none;
              }
             
             
            </style>
              <div id='info' class="alert alert-danger" >
              This email id is not register, Please enter your register email...
              </div>
              <div id='info2' class="alert alert-info" >
              Your password is sent to your email. please check your email... Thanks!
              </div>
              <div id='info3' class="alert alert-warning" >
              Unable to send email! please try again later.... Thanks!
              </div>
              <div>
              <button type="submit" name="sendpass" class="btn btn-default submit" >Next</button>
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
        if(isset($_POST['sendpass']))
        {
        $email=$_POST['email'];
        $query="SELECT * FROM `hostel` WHERE `email`='$email'";
        $run=mysqli_query($con, $query);
        $check=mysqli_num_rows($run);
        if($check>0){
          $row=mysqli_fetch_array($run);
          $name=$row['name'];
          $password=$row['password'];
$to = $email;
$subject = 'Global Hostel Manangement Account Password';
$from = 'stylish778899@gmail.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi '.$name.'!</h1>';
$message .= '<p style="color:#080;font-size:18px;">Your Global Hostel Management Password is <h3 style="color:#f40;">'.$password.'</h3></p>';
$message .= '</body></html>';

 
// Sending email
if(@mail($to, $subject, $message, $headers)){
    ?>

          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
         <script type="text/javascript">
        $(function () {
           
                var seconds = 8;
                $("#info2").show();
               
                setInterval(function () {
                    seconds--;
                    
                    if (seconds == 0) {
                        $("#info2").hide();
                        window.location = "login.php";
                    }
                }, 1000);
           
        });
    </script>

          <?php
} else{
   ?>

          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
         <script type="text/javascript">
        $(function () {
           
                var seconds = 6;
                $("#info3").show();
               
                setInterval(function () {
                    seconds--;
                    
                    if (seconds == 0) {
                        $("#info3").hide();
                        window.location = "lostPassword.php";
                    }
                }, 1000);
           
        });
    </script>

          <?php
}

         

        exit();
        }
        else
        {
        echo "<script>document.getElementById('info').style.display='block'</script>";
        }
          
        }
        ?>

      </div>
    </div>

     <!-- Modal content-->
      <div id="toast"><div id="img">Icon</div><div id="desc">A notification message..</div></div>
      
    
  </body>
</html>
