            <?php 
              include("include/db.php"); 
              include("include/header.php");
            ?>
      
        <!-- page content -->

        <div class="right_col" role="main">
          <div class="">
           <div class="clearfix"></div>
            <?php if (isset($_GET['did'])) { ?>
              <div class="alert alert-success">
                <strong>Room ! </strong> Delete Successfully.
              </div>  
            <?php } ?>
            <div class="page-title">
              <div class="title_left">
                <h3>All Rooms</h3>
              </div>
<form method="post" action="rooms.php">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for room...">
                    <span class="input-group-btn">
                      <button  class="btn btn-default" type="submit">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
</form>
            </div>
             <div class="clearfix"></div>
              <?php 
             if (isset($_GET['msg']) && $_GET['msg']=='update') {  ?>
              <div class="alert alert-success">
                <strong>Room ! </strong> Update Successfully.
              </div>    
             <?php  } ?>
           
            <?php 
            if (isset($_POST['search'])) {
               $search=$_POST['search'];
$query="select * from room where room_no LIKE '%$search%' && hostel_id=$id";

            }else{
              $query="select * from room where hostel_id=$id";
              }
              
              $result=mysqli_query($con,$query);
              if (mysqli_num_rows($result)==0) {
               echo "<h2>No recard found!</h2>";
              }
              while ($row=mysqli_fetch_array($result)) {  ?> 
              
             <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_title">
                            <h2>Room No:<?php echo $row['room_no']; ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link" href="room_setting.php?rid=<?php echo $row['id']; ?>"><i class="fa fa-wrench"></i></a>
                              </li>

                              <li><a class="" onclick="fun(<?php echo $row['id']; ?>)"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
             <img src="images/<?php echo $row['image']; ?>" width="200px" height="130px" alt="No image found">
                            </div>
                            <div class="divider"></div>

                            <ul class="legend list-unstyled">
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-bed"></i></span> <span class="name">Total seats : <?php echo $row['t_seats']; ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-bed"></i></span> <span class="name">Available seats : <?php echo $row['a_seats']; ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-money"></i></span> <span class="name">Fee per seat : <?php echo $row['fee']; ?></span>
                                </p>
                              </li>
                              <?php if ($row['washroom']==1) { ?>
                                  <li>
                                <p>
                                  <span class="icon"><i class="fa fa-building-o"></i></span> <span class="name">Atached washroom.</span>
                                </p>
                              </li>
                           <?php   } ?>
                           <?php if ($row['metrices']==1) { ?>
                                  <li>
                                <p>
                                  <span class="icon"><i class="fa fa-hdd-o"></i></span> <span class="name">Metrices Available.</span>
                                </p>
                              </li>
                           <?php   } ?>
                           <?php if ($row['bed']==1) { ?>
                                  <li>
                                <p>
                                  <span class="icon"><i class="fa fa-bed"></i></span> <span class="name">Beds Available.</span>
                                </p>
                              </li>
                           <?php   } ?>
                             
                            </ul>

                          </div>
                        </div>
                      </div>
                 <?php }   ?>
            <div class="clearfix"></div>
        </div>
      </div>
      <input type="hidden" id="ids">
<script type="text/javascript">
  function fun(id){
document.getElementById('ids').value=id;
$('#myModal').modal('toggle');    
  }
  function fun2(){
    id=document.getElementById('ids').value;
    window.open("delete.php?id="+id, "_self");
  }
</script>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Room Deletion</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure to delete Room data from Hostel?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
          <button type="button" onclick="fun2()" class="btn btn-default" data-dismiss="modal">Yes</button>
        </div>
      </div>
      
    </div>
  </div>
  

<?php include("include/footer.php"); ?>