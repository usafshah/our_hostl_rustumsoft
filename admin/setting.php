        <?php include("include/db.php"); 
              include("include/header.php"); ?>
        <script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>
        <style>
          #nameDiv, #updateRoom, #updatePhone, #updateMobile, #updateEmail, #updateHostel, #updateSecurity, #updateAddmission, #updateLaundary, #updateInternet, #updateGen, #updateTv, #updateGuest, #updateKey, #updateAdd{
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
              window.open('setting.php', '_self');

            }
        };
        xmlhttp.open("GET", "updateFieldAjax.php?name=" +str+"&val="+val1, true);
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
                    <?php if($roundIncomplete!=100){ ?>
                    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
                      <h3 align="center">Complete Setting</h3>
                     <?php
                     if(empty($row['phone_no']))
                     {
                      ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hostel Phone No
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="phone" type="text">
                        </div>
                        </div>
                        <?php
                        }
                        
                        if($row['sec_fee']==0)
                        {
                         ?>
                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Security Fee 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="sec_fee"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <?php
                      }

                      if($row['add_fee']==0)
                        {
                         ?>
                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Addmission Fee
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="add_fee"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <?php
                      }
                      if(empty($row['rules']))
                      {
                      ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Hostel Rules
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="rules" id="text" class="form-control col-md-7 col-xs-12"></textarea>
                          <script>
                           CKEDITOR.replace( 'text' );
                          </script>
                        </div>
                      </div>
                      <?php }
                      
                      ?>
                      <?php
                        if(empty($row['keyword'])){
                        ?>
                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Nearest Places.
                          <br><sup style="color:blue;">Write famous places names which are near to Hostel  separate by comma e.g Silk Center, Rehmanabad Metro Station, Commercial etc</sup>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="keyword" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <?php } ?>

                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="center">
                          
                          <button id="send" type="submit" name="update" class="btn btn-success">&nbsp;Save&nbsp;</button>
                          <button type="button" onclick="go()" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
                    </form>
<?php
  if(isset($_POST['update']))
  {
    @$phone=$_POST['phone'];
    if(empty($phone)){ $phone=$row['phone_no']; }
    @$sec_fee=$_POST['sec_fee'];
    if($sec_fee<1){ $sec_fee=$row['sec_fee']; }
    @$add_fee=$_POST['add_fee'];
    if($add_fee<1){ $add_fee=$row['add_fee']; }
    @$rules=$_POST['rules'];
    if(empty($rules)){ $rules=$row['rules']; }
    @$keyword=$_POST['keyword'];
    if(empty($keyword)){ $keyword=$row['keyword']; }

    $updateHostel="UPDATE `hostel` SET `phone_no`='$phone',`sec_fee`='$sec_fee',`add_fee`='$add_fee',`rules`='$rules',`keyword`='$keyword' WHERE `id`='$id'";
    $runUpdateHostel=mysqli_query($con, $updateHostel);
    if($runUpdateHostel)
    {
      echo "<script>alert('Setting Successfully Updated...')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Oops! Something goes wrong, Try again later...')</script>";
      echo "<script>window.open('setting.php','_self')</script>";
    }
  }


}
else
{
  ?>
  <style>
    .tdH{
      width: 20%;
    }
  </style>
  <div id="txtHint">
    
  </div>
   <table class="table table-hover">
        <tbody>
          <tr id="imgTr">
            <td class="tdH">Hostel Image: </td>
            <td id="imgTd"><img src="images/<?php echo $row['image']; ?>" style="width: 80px; height: 80px;"></td>
            <td><a href="updateImage.php" title="Edit"><i class="fa fa-pencil"></i></a></td>
          </tr>
          <tr id="name">
            <td class="tdH">Hostel Name: </td>
            <td id="divVal"><?php echo $row['name']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('name','nameDiv')"><i class="fa fa-pencil"></i></button></td>
          </tr>
      
            
          <tr id="nameDiv">
            <td class="tdH">Hostel Name: </td>
            <td><input type="text" name="updateName" id="updateName" value="<?php echo $row['name']; ?>"></td>
            <td><button onclick="update('name', 'nameDiv', 'name','divVal','updateName')">Update</button></td>
              </tr>   
          <tr id="roomTr">
            <td class="tdH">Total Room: </td>
            <td id="divRoom"><?php echo $row['t_room']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('roomTr','updateRoom')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateRoom">
            <td class="tdH">Total Room: </td>
            <td><input type="text" id="room" value="<?php echo $row['t_room']; ?>"></td>
            <td><button onclick="update('t_room', 'updateRoom', 'roomTr','divRoom','room')">Update</button></td>
              </tr>   

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

          <tr id="hostelTr">
            <td class="tdH">Hostel For:</td>
            <td id="hostelTd"><?php if($row['hostel_type']==1){ echo "Male"; } else {echo "Female";} ?></td>
            <td><button class="b" title="Edit" onclick="showName('hostelTr','updateHostel')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateHostel">
            <td class="tdH">Hostel For: </td>
            <td><div class="item form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="hostel">
                            <?php if($row['laundary']==1){ ?>
                            <option value="1" selected>Male</option>
                            <option value="0">Female</option>
                            <?php } else { ?>
                            <option value="0" selected>Female</option>
                            <option value="1">Male</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div></td>
            <td><button onclick="update('hostel_type', 'updateHostel', 'hostelTr','hostelTd','hostel')">Update</button></td>
              </tr>
          <tr id="securityTr">
            <td class="tdH">Security Fee</td>
            <td id="securityTd"><?php echo $row['sec_fee']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('securityTr','updateSecurity')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateSecurity">
            <td class="tdH">Security Fee: </td>
            <td><input type="text" id="security" value="<?php echo $row['sec_fee']; ?>"></td>
            <td><button onclick="update('sec_fee', 'updateSecurity', 'securityTr','securityTd','security')">Update</button></td>
              </tr>
          <tr id="addmissionTr">
            <td class="tdH">Addmission Fee</td>
            <td id="addmissionTd"><?php echo $row['add_fee']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('addmissionTr','updateAddmission')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateAddmission">
            <td class="tdH">Addmission Fee: </td>
            <td><input type="text" id="addmission" value="<?php echo $row['add_fee']; ?>"></td>
            <td><button onclick="update('add_fee', 'updateAddmission', 'addmissionTr','addmissionTd','addmission')">Update</button></td>
              </tr>
          <tr id="laundaryTr">
            <td class="tdH">Laundary</td>
            <td id="laundaryTd"><?php if($row['laundary']==1){ echo "Yes"; } else { echo "No"; } ?></td>
            <td><button class="b" title="Edit" onclick="showName('laundaryTr','updateLaundary')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateLaundary">
          <td id="tdH">Laundary</td>
          <td><div class="item form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="laundary">
                            <?php if($row['laundary']==1){ ?>
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div></td>
         <td><button onclick="update('laundary', 'updateLaundary', 'laundaryTr','laundaryTd','laundary')">Update</button></td>

            </tr>

          <tr id="internetTr">
            <td class="tdH">Internet Connection</td>
            <td id="internetTd"><?php if($row['internet']==1){ echo "Yes"; } else { echo "No"; } ?></td>
            <td><button class="b" title="Edit" onclick="showName('internetTr','updateInternet')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateInternet">
          <td id="tdH">Internet Connection</td>
          <td><div class="item form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="internet">
                            <?php if($row['internet']==1){ ?>
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div></td>
         <td><button onclick="update('internet', 'updateInternet', 'internetTr','internetTd','internet')">Update</button></td>
            </tr>
          <tr id="genTr">
            <td class="tdH">Generator</td>
            <td id="genTd"><?php if($row['genrator']==1){ echo "Yes"; } else { echo "No"; } ?></td>
            <td><button class="b" title="Edit" onclick="showName('genTr','updateGen')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateGen">
          <td id="tdH">Generator</td>
          <td><div class="item form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="gen">
                            <?php if($row['genrator']==1){ ?>
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div></td>
         <td><button onclick="update('genrator', 'updateGen', 'genTr','genTd','gen')">Update</button></td>
            </tr>
          <tr id="tvTr">
            <td class="tdH">Television</td>
            <td id="tvTd"><?php if($row['tv']==1){ echo "Yes"; } else { echo "No"; } ?></td>
            <td><button class="b" title="Edit" onclick="showName('tvTr','updateTv')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateTv">
          <td id="tdH">Television</td>
          <td><div class="item form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="tv">
                            <?php if($row['tv']==1){ ?>
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div></td>
         <td><button onclick="update('tv', 'updateTv', 'tvTr','tvTd','tv')">Update</button></td>
            </tr>
          <tr id="guestTr">
            <td class="tdH">Guest: </td>
            <td id="guestTd"><?php if($row['guest']==1){ echo "Yes"; } else { echo "No"; } ?></td>
            <td><button class="b" title="Edit" onclick="showName('guestTr','updateGuest')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateGuest">
          <td id="tdH">Guest: </td>
          <td><div class="item form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="guest">
                            <?php if($row['guest']==1){ ?>
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                            <?php } else { ?>
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div></td>
         <td><button onclick="update('guest', 'updateGuest', 'guestTr','guestTd','guest')">Update</button></td>
            </tr>

          <tr id="keyTr">
            <td class="tdH">Keyword: </td>
            <td id="keyTd"><?php echo $row['keyword']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('keyTr','updateKey')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateKey">
            <td class="tdH">Keyword: </td>
            <td><textarea id="keyword"><?php echo $row['keyword']; ?></textarea></td>
            <td><button onclick="update('keyword', 'updateKey', 'keyTr','keyTd','keyword')">Update</button></td>
              </tr>
          <tr id="addTr">
            <td class="tdH">Address: </td>
            <td id="addTd"><?php echo $row['address']; ?></td>
            <td><button class="b" title="Edit" onclick="showName('addTr','updateAdd')"><i class="fa fa-pencil"></i></button></td>
          </tr>
          <tr id="updateAdd">
            <td class="tdH">Address: </td>
            <td><textarea id="add"><?php echo $row['address']; ?></textarea></td>
            <td><button onclick="update('address', 'updateAdd', 'addTr','addTd','add')">Update</button></td>
              </tr>
          <tr id="rulTr">
            <td class="tdH">Rules</td>
            <td id="rulTd"><?php echo $row['rules']; ?></td>
            <td><a href="updateRule.php" title="Edit"><i class="fa fa-pencil"></i></a></td>
          </tr>
         
                        
        </tbody>
  </table>
<?php
}
?>
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
          window.open('index.php','_self');
         }
        </script>
        <!-- /page content -->
<?php include("include/footer.php"); ?>