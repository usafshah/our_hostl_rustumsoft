<?php  
include("db.php");
 $selectRoom="SELECT * FROM `hostel` where hostel_type != 3 && status=0";
              $runRoom=mysqli_query($con, $selectRoom);
              $count=mysqli_num_rows($runRoom);
              $approve_hostel=0;
              $pending_hostel=0;
echo ' <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-home" style="font-size:26px;" ></i>
                    <span class="badge bg-green">'.$count.'</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">';
                    while ($row=mysqli_fetch_array($runRoom)) { 
                    echo '<li>
                      <a href="hostel-detail.php?hid='.$row['id'].'">
                        <span class="image" ><img style="width:22%;" src="../admin/images/'.$row['image'].'" alt="Profile Image" /></span>
                        <span>
                          <span><b>'.$row['name'].'</b></span>
                         </span>
                        <span class="message">
                          <span>Address: '.$row['address'].'</span><br>
                          <span>Phone:'.$row['mobile'].'</span>
                        </span>
                      </a>
                    </li>';
                }  
  echo '</ul>';

?>