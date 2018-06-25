<?php  
 include 'includes/db.php';
 $output = '';  
$output='<option value="0">--District--</option>';
 $sql = "SELECT * FROM district WHERE province_id=".$_POST["search"]." ORDER BY name";  
 $result = mysqli_query($con, $sql);  
 while($row = mysqli_fetch_array($result))  
 {    
      $output .=  		
                '<option value='.$row["id"].'>'.$row["name"].'</option>'; 	    
        }  
      echo $output;  
  
 ?>  