            <?php 
              include("include/db.php"); 
              include("include/header.php");
              $get_id=$_GET['fid'];
             // $get_p_id=$_GET['p_id'];
            ?>
            <style type="text/css">
              
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table tr {

  border: 1px solid #ddd;
  
}

table th,
table td {
  padding: .625em;
    
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
    width: 100%
  }
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: 15px;
    text-align: center;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
</style>
      
        <!-- page content -->

        <div class="right_col" role="main">
          <div class="">
           <div class="clearfix"></div>
           <?php if ($get_id>0){
    $rm="SELECT * FROM flats WHERE id=$get_id ";
    $rmr=mysqli_query($con,$rm);
    if(mysqli_num_rows($rmr)==0){
      echo "NOTHING HERE! GO BACK.";
      }else {?>
    <div class="container p-2">
    <div class="row">
    <div class="col-sm-8 col-md-8" style="padding: 0px;">
     <?php 
     while($row=mysqli_fetch_array($rmr)){
      $p_id=$row['p_id'];
    ?>
          
        <div class="col-sm-8 col-md-10" style="padding: 20px;"><table>
        <tbody>
  <tr>
              <td><img src="../images/<?php echo $row['image']; ?>"  alt="No image" style="width: 100%;"/>
              
              <td style="font-weight: bold;"><h2 style="font-size: 25px;"><?php echo $row['name']; ?></h2></td></td>
              
            </tr>
            <tr>
              
              
            </tr>
            <tr>
              <td style="padding:2px 20px 2px 20px; color: #00adef;font-size: 20px; background-color: #dbf5ff;">Rooms</td>
              <td style="font-weight: bold;"><?php echo $row['rooms']; ?></td>
             
            </tr>
            <tr>
              <td style="padding:2px 20px 2px 20px; color: #00adef;font-size: 20px; background-color: #dbf5ff;">Furnished</td>
              <td style="font-weight: bold;"><?php echo $row['furnished'];?></td>
             
            </tr>
            <tr>
              <td style="padding:2px 20px 2px 20px; color: #00adef;font-size: 20px; background-color: #dbf5ff;">Address</td>
              <td style="font-weight: bold;"><?php echo $row['address']; ?></td>
              
            </tr>
            <tr>
              <td style="padding:2px 20px 2px 20px; color: #00adef;font-size: 20px; background-color: #dbf5ff;">Email</td>
              <td style="font-weight: bold;"> 
              <?php $cont="SELECT * FROM hostel WHERE id=$p_id";
                                  $con_qry=mysqli_query($con,$cont);
                                  while ($con_row=mysqli_fetch_array($con_qry)) {
                                  echo $con_row['email'];?></td>
              
            </tr>
            <tr>
              <td style="padding:2px 20px 2px 20px; color: #00adef;font-size: 20px; background-color: #dbf5ff;">Contact</td>
              <td style="font-weight: bold;"><?php echo "Mobile: "; echo $con_row['mobile'];echo"<br>Tel #: ".$con_row['phone_no']; }?></td>
             
            </tr>
           
            <tr>
              <td style="padding:2px 20px 2px 20px; color: #00adef;font-size: 20px; background-color: #dbf5ff;">Status</td>
              <td style="font-weight: bold;">
              <div class="btn-group" id="status" data-toggle="buttons">
              <style type="text/css">
                .man{
                  background :#5bc0de;
                }
              </style>

              <label class="btn btn-default <?php echo ($row['status'] ==1) ? 'man' : '' ; ?>" id='abc' onclick="active(1,<?php echo $row['id']; ?>)">
              <input type="radio" value="1"  >Approve</label>
              <label class="btn btn-default <?php echo ($row['status'] ==0) ? 'man' : '' ; ?>" id='gfh' onclick="active(0,<?php echo $row['id']; ?>)">
              <input type="radio" value="0" >Disapprove</label>
            </div></td>
             
            </tr>
          </tbody>
</table><?php }?>
        <div class="clearfix"></div> 

        </div>
</div>
        <div class="col-sm-3 col-md-4" style="padding: 0px; margin-left: -10px;"><style>
       #map {
        height: 500px;
        width: 100%;
       }
    </style>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 33.632211, lng: 73.073567};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd5qFRPFPUrmAfFjh5cPwFV-QhB_UwAIk&callback=initMap">
    </script>
  
    
    </div><!--Image Gallery Start-->
    </div></div>
  <div class="main-sep" style="padding-top: 20px;"><img src="../images/shadow.png" class="img-responsive" /></div>
  
  <div class="container p-2"><!--Small Populars Start-->
  
    
  </div><?php }}?><!--Small Populars End-->

            <div class="clearfix"></div>
        </div>
      </div>
      <input type="hidden" id="ids">
<script type="text/javascript">
  function active(id,fid){   
   if(id==1){    
    document.getElementById('abc').style.background = "#5bc0de";
    document.getElementById('abc').style.color ="white";
    document.getElementById('gfh').style.background = "white";
    document.getElementById('gfh').style.color = "black";
    
    $.ajax({
            method: "POST",
            url: "flat-update.php",
            data: {on_id:fid},
            success:function(){
              alert(on_id);
            }
           });
    }
    else{
    document.getElementById('gfh').style.background = "#5bc0de";
    document.getElementById('gfh').style.color = "white";
    document.getElementById('abc').style.background = "white";
    document.getElementById('abc').style.color = "black";
    $.ajax({
            method: "POST",
            url: "flat-update.php",
            data: {off_id:fid},
            success:function(){
              
            }
           });
    }

    
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