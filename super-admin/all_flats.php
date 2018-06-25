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
                <strong>Flat ! </strong> Delete Successfully.
              </div>  
            <?php } ?>
            <div class="page-title">
              <div class="title_left">
                <h3>All Flates</h3>
              </div>
<form method="post" action="all_flats.php">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for Flat...">
                    <span class="input-group-btn">
                      <button  class="btn btn-default" type="submit">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
</form>
            </div>
            
           <!-- Searching Field -->
            <?php 
            if (isset($_POST['search'])) {
               $search=$_POST['search'];
             $query="select * from flats where name LIKE '%$search%'";

            }else{
              $query="select * from flats";
              }
              
              $result=mysqli_query($con,$query);
              if (mysqli_num_rows($result)==0) {
               echo "<h2>No record found!</h2>";
              }
              while ($row=mysqli_fetch_array($result)) {  
                $p_id=$row['p_id'];?> 
              
             <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_title">
                            <h2 class="col-md-8"><?php echo $row['name']; ?></h2>
                            <div class="col-sm-1" style="float: right;"><ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link" href="flat-details.php?fid=<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></a>
                              </li>

                              <li><a class="" onclick="funm(<?php echo $row['id']; ?>)"><i class="fa fa-close"></i></a>
                              </li>
                            </ul></div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
             <img src="../images/<?php echo $row['image']; ?>" width="200px" height="130px" alt="No image found">
                            </div>
                            <div class="divider"></div>

                            <ul class="legend list-unstyled">
                              <li>
                                <p>
                                  <span class="name">Address:&nbsp<?php echo $row['address'];  ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="name">Contact #:&nbsp<?php 
                                  $cont="SELECT * FROM hostel WHERE id=$p_id";
                                  $con_qry=mysqli_query($con,$cont);
                                  while ($con_row=mysqli_fetch_array($con_qry)) {
                                    echo $con_row['phone_no'];}?></span>
                                </p>
                              </li>

                              <li>
                                <p>
                                  <span class="name">Status:&nbsp<?php if($row['status']==0){echo "<text style='color:red'>No Approved";}else{echo "<text style='color:Green'>Approved";} ?></span>
                                </p>
                              </li></ul>

                          </div>
                        </div>
                      </div>
                 <?php }   ?>
            <div class="clearfix"></div>
        </div>
        <?php
                              if (isset($_POST['search'])) {?>
                              <a style="float: right;" href="all_hostels.php"><h4>Go Back</h4></a>
                             <?php } ?>
      </div>
      <input type="hidden" id="ids">
<script type="text/javascript">
  function funm(id){
document.getElementById('ids').value=id;
$('#myModal').modal('toggle');    
  }
  function fun2(){
    id=document.getElementById('ids').value;
    window.open("delete.php?pid="+id, "_self");
  }
</script>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Flat Deletion</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure to delete the Flat?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
          <button type="button" onclick="fun2()" class="btn btn-default" data-dismiss="modal">Yes</button>
        </div>
      </div>
      
    </div>
  </div>
  

<?php include("include/footer.php"); ?>