        <?php include("include/db.php"); 
              include("include/header2.php"); ?>
        <script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>
        <style>
          #nameDiv, #updateRoom, #updatePhone, #updateMobile, #updateEmail, #updateHostel, #updateSecurity, #updateAddmission, #updateLaundary, #updateInternet, #updateGen, #updateTv, #updateGuest, #updateKey, #updateAdd,#showInfoDiv{
            display: none;
          }
          .b{
            border: 0px;
            background: none;
          }
        </style>
        <script>
          function showName(div, updateDiv)
        {
          document.getElementById(div).style.display = 'none';
          document.getElementById(updateDiv).style.display = 'block';
        }

function update(str, updateDiv, div, divVal, id) {
  var val1=document.getElementById(id).value;
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById(updateDiv).style.display = 'none';
              document.getElementById(div).style.display = 'block';
              document.getElementById(divVal).innerHTML = this.responseText;
              window.open('setting2.php', '_self');

            }
        };
        xmlhttp.open("GET", "updateFieldAjax2.php?name=" +str+"&val="+val1, true);
        xmlhttp.send();
    }
    
}

function check() {
  var val1=document.getElementById('oldPass').value;
    if (val1.length == 0) { 
        document.getElementById("infoDiv").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             var x =this.responseText;
             if(x!="correct")
             {
              document.getElementById('infoDiv').innerHTML = this.responseText;
              document.getElementById('changeBtn').disabled=true;
              }
              else
              {
              document.getElementById('infoDiv').innerHTML = '';
              document.getElementById('changeBtn').disabled=false;
              }
           }
        };
        xmlhttp.open("GET", "compare.php?val="+val1, true);
        xmlhttp.send();
    }
    
}


</script>

          <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
               
                  <div class="x_content">
                    
  <style>
    .tdH{
      width: 20%;
    }
  </style>
   
   <table class="table table-hover">
 <div id="showInfoDiv" align="center" style="color:white; margin: auto; font-size: 20px; font-family:Georgia, Times, 'Times New Roman', serif; background: green; border: 2px solid maroon; max-width: 100%; height: 60px;border-radius: 20px; line-height: 60px;">
    
  </div>
        <tbody>

          <!-- <tr id="imgTr">
            <td class="tdH"> </td>
            <td id="imgTd"><img src="images/<?php //echo $row['name']; ?>" style="width: 80px; height: 80px;"></td>
            <td><a href="updateImage.php" title="Edit"><i class="fa fa-pencil"></i></a></td>
          </tr> -->
          <div id="info" style="color: blue;"></div>
          <tr id="name">
            <td class="tdH">Property Dealer Name:: </td>
            <td id="divVal"><?php echo $row['name']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('name','nameDiv')"><i class="fa fa-pencil"></i></button></td>
          </tr>
      
            
          <tr id="nameDiv">
            <td class="tdH">Property Dealer Name: </td>
            <td><input type="text" name="updateName" id="updateName" value="<?php echo $row['name']; ?>"></td>
            <td><button onclick="update('name', 'nameDiv', 'name','divVal','updateName')">Update</button></td>
              </tr>   
          <!-- <tr id="roomTr">
            <td class="tdH">Total Room: </td>
            <td id="divRoom"><?php //echo $row['t_room']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('roomTr','updateRoom')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateRoom">
            <td class="tdH">Total Room: </td>
            <td><input type="text" id="room" value="<?php //echo $row['t_room']; ?>"></td>
            <td><button onclick="update('t_room', 'updateRoom', 'roomTr','divRoom','room')">Update</button></td>
              </tr>    -->

          <tr id="phoneTr">
            <td class="tdH">Phone Number</td>
            <td id="PhoneTd"><?php echo $row['phone_no']; ?></td>
             <td><button class="b" title="Edit" onclick="showName('phoneTr','updatePhone')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updatePhone">
            <td class="tdH">Phone Number: </td>
            <td><input type="text" id="phone" value="<?php echo $row['phone_no']; ?>"></td>
            <td><button onclick="update('phone_no', 'updatePhone', 'phoneTr','PhoneTd','phone')">Update</button></td>
              </tr>   

          <tr id="mobileTr">
            <td class="tdH">Mobile Number</td>
            <td id="mobileTd"><?php echo $row['mobile']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('mobileTr','updateMobile')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateMobile">
            <td class="tdH">Mobile Number: </td>
            <td><input type="text" id="mobile" value="<?php echo $row['mobile']; ?>"></td>
            <td><button onclick="update('mobile', 'updateMobile', 'mobileTr','mobileTd','mobile')">Update</button></td>
              </tr>   
          <tr id="emailTr">
            <td class="tdH">Email ID</td>
            <td id="emailTd"><?php echo $row['email']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('emailTr','updateEmail')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateEmail">
            <td class="tdH">Email ID: </td>
            <td><input type="text" id="email" value="<?php echo $row['email']; ?>"></td>
            <td><button onclick="update('email', 'updateEmail', 'emailTr','emailTd','email')">Update</button></td>
              </tr>

         
          <tr id="keyTr">
            <td class="tdH">Password: </td>
            <td id="keyTd">xxxxxxx</td>
            <td><button class="b" title="Edit" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></button></td>
          </tr>
          
          
         
                        
        </tbody>
  </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" class="form-horizontal form-label-left" >
          <div class="item form-group">
                        <label for="password" class="control-label col-md-3"  autofocus>Old Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="oldPass" type="password" name="oldPass"  class="form-control col-md-7 col-xs-12" required="required" onkeyup="check()">
                          <div id="infoDiv" style="color: maroon;"></div>
                        </div>
                      </div>
          <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password"  class="form-control col-md-7 col-xs-12" required="required">

                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2"  class="form-control col-md-7 col-xs-12" required="required" onkeyup="comparePass()">
                          <div id="showInfo" style="color: maroon;"></div>
                        </div>
                      </div>
                    
        </div>
        <div class="modal-footer">
         <button type="submit" name="changePass" id="changeBtn" class="btn btn-default">Change Password</button>
         </form> <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>



  <script>
  
      function doHide(){
    document.getElementById( "showInfoDiv" ).style.display = "none" ;
  }

  function hideDiv(){
    document.getElementById( "showInfoDiv" ).style.display="block";
    document.getElementById( "showInfoDiv" ).innerHTML = "Password Updated Successfully..." ;
    //  5000 = 5 seconds
    setTimeout( "doHide()", 5000 ) ;
  }
  </script>
  <?php
  if(isset($_POST['password']))
  {
   echo $pass=$_POST['password'];

    $updatePass="UPDATE `hostel` SET `password`='$pass' WHERE `id`='$id'";
    $runUpdatePass=mysqli_query($con, $updatePass);
    if($runUpdatePass)
    {
      ?>
      <script>
        hideDiv();
      </script>
      <?php
    }
   
  }
   ?>


        <!-- /page content -->
        <script>
         function go()
         {
          window.open('setting2.php','_self');
         }
         function comparePass()
         {
          var pass = document.getElementById('password').value;
          var repeatPass = document.getElementById('password2').value;
          if(pass !=  repeatPass)
          {
            document.getElementById('showInfo').innerHTML="Password Not Matched...";
            document.getElementById('changeBtn').disabled=true;
          }
          else
          {
            document.getElementById('showInfo').innerHTML="";
             document.getElementById('changeBtn').disabled=false;
          }
         }

        </script>

        <!-- /page content -->
  
<?php include("include/footer.php"); ?>