<?php include("include/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<style>
       #map {
        /*height: 100%;*/
        height: 500px;
        width: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      @media only screen and (max-width: 600px) {
      #pac-input{
        width: 250px;
      }
    }
    </style>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Here| </title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-10 left_col">
          <div class="left_col scroll-view">
           

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
                <h3 align="center">Register Here</h3>
              

             
            </div>
            <div class="clearfix"></div>
 
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <p align="center">All the fields which are marked as <code>*</code> are required fields. It must be fill correctly...
                      </p>

               <div class="item form-group">
                       <div class="col-md-1 col-sm-1 col-xs-12"></div>
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Register As : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control col-md-7 col-xs-12" id="register_as" >
                            <option value='1' >Hostal Warden</option>
                            <option value='2'>Property Dealer</option>
                        </select>
                        </div>
                       <div class="col-md-3 col-sm-3 col-xs-12"></div>

                      </div>
                  <div class="x_content" id="form">

                    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>

                      
                    



                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hostel Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="name" placeholder="Full Name e.g Youth Hostel" required="required" type="text">
                        </div>
                        </div>
                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Total Rooms <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="room" required="required" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                   
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Hostel phone No
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone"  data-validate-length-range="7,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                     
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hostel Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="image" class="form-control col-md-7 col-xs-12"  name="image" required="required" type="file">
                        </div>
                        </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hostel For <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <p>
                        <input type="radio" class="flat" name="hostelFor" id="genderM" value="1"  checked /> Male &nbsp;&nbsp;&nbsp;
                       <input type="radio" class="flat" name="hostelFor" id="genderF" value="0"  /> Female
                        </p>
                        </div>
                        </div>
                       <div class="form-group">
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="location" class="form-control col-md-7 col-xs-12" type="hidden" name="location" placeholder="Enter Google latitude and longitude e.g 33.632134, 73.073512">
                        </div>
                      </div>
    <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Find your hostel address
        </div>
      </div>
      <br>
      <div id="pac-container">
        <input id="pac-input" type="text"
            placeholder="Enter a location" name="address" required>
      </div>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
    </br>
    <div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Verification:</label>  
  <div class="input-group">
    <input type="checkbox" name="ckeck" id="check" onclick="checkboxEvent()" required>
By clicking <b>SUBMIT</b> you confirm that your address is correct on google map.if not correct pleace enter the address again.
  </div>
</div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="center">
                          
                          <button id="send" type="submit" name="register" class="btn btn-success">Register</button>
                          <button type="button" onclick="go()" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
                    </form>
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
          window.open('login.php','_self');
         }
        </script>
        <?php
        if(isset($_POST['name']))
        {
        $name=$_POST['name'];
        $room=$_POST['room'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        $location=$_POST['location'];
       
        $hostelFor=$_POST['hostelFor'];

        //Getting Hostel Image
        $rand=rand(0000,9999);
         $image = $_FILES['image']['name'];
         $image_tmp = $_FILES['image']['tmp_name'];
         $image=$rand.$image;

      $query="INSERT INTO `hostel`(`name`, `t_room`, `phone_no`, `mobile`, `email`, `address`, `hostel_type`, `image`, `password`,keyword,location) VALUES ('$name','$room','$phone','$number','$email','$address','$hostelFor','$image','$password','','$location')";
        $run=mysqli_query($con, $query);

        if($run)
        {
           move_uploaded_file($image_tmp, "images/$image");
          echo "<script>window.open('login.php?msg=done','_self')</script>";
        }
        else
        {
           echo "<script>alert('Oops! Something goes wrong try again...')</script>";
          echo "<script>window.open('register.php','_self')</script>";
        }
        }elseif(isset($_POST['register2']))
        {
        $name=$_POST['name1'];
        $email=$_POST['email'];
        $number=$_POST['phone'];
        $address=$_POST['address'];
        $password=$_POST['password'];
       
        
       $query="INSERT INTO `hostel`(`name`,`mobile`, `email`, `address`, `hostel_type`,`password`) VALUES ('$name','$number','$email','$address','3','$password')";
       
        $run=mysqli_query($con, $query);
        if($run)
        {
           echo "<script>window.open('login.php?msg=done','_self')</script>";
        }
        else
        {
           echo "<script>alert('Oops! Something goes wrong try again...')</script>";
          echo "<script>window.open('register.php','_self')</script>";
        }
        }

         ?>

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
<script type="text/javascript">
$(document).ready(function(){  
      $('#register_as').change(function(){
            
           var txt = $(this).val();
           if (txt==2) {
            if(txt != '')  
           {    
                $.ajax({  
                     url:"data.php",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#form').html(data);
                          
                     }  
                });  
           }  
           else  
           {  
              $('#form').html('error');                  
           } 
           }else{
            window.open('register.php','_self');
           }
           
      });
      });
</script>
<script>
       function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 28.8037839, lng: 69.799669},
          zoom: 6
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

      map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }
           if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(15);  
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }
//alert(place.name+address);
document.getElementById('location').value=place.geometry.location;

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

         function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd5qFRPFPUrmAfFjh5cPwFV-QhB_UwAIk&libraries=places&callback=initMap"
        async defer></script>