<div class="container-fluid b-1">
    
      <div class="container">
      
        <footer>
        
          <div class="row">
          
            <div class="col-md-3">
            
              <img src="images/footer-logo.png" class="img-responsive" />
            
            </div>
            
           
            
            <div class="col-md-4">
            
              <div class="footer-title">Contact</div>
              
              <p>#00, Street# 11, Sector# 22, Islamabad, Pakistan.</p>
              
              <p>Tel: +92 000 0000000<br />Email: <a href="#">info@abc.com</a></p>
              
              
              
              <div class="footer-title">Social</div>
              
              <div class="blocky">
      
                <a href="#" class="btn btn-fb custom" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#" class="btn btn-tw custom" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" class="btn btn-li custom" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="btn btn-gp custom" target="_blank"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="btn btn-pt custom" target="_blank"><i class="fa fa-pinterest"></i></a>
                <a href="#" class="btn btn-yt custom" target="_blank"><i class="fa fa-youtube"></i></a>
        
                  <div class="clear"></div>
              
              </div>
            
            </div>
            
            <div class="col-md-5">
            
              <div class="footer-title">Partners</div>
              
              <div class="partner-logo"><a href="#" target="_blank"><img src="images/partner-logo.png"></a></div>
              
              <div class="partner-logo"><a href="#" target="_blank"><img src="images/partner-logo.png"></a></div>
              
              <div class="partner-logo"><a href="#" target="_blank"><img src="images/partner-logo.png"></a></div>
              
                         
            </div>
          
          </div>
          
          <hr>
        
        </footer>
      
      </div>
    
    </div> 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>    
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
<script>
$(document).ready(function(){  
      $('#province').change(function(){
            
           var txt = $(this).val();  
           if(txt != '')  
           {  
                $.ajax({  
                     url:"district.php",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#district').html(data);  
                     }  
                });  
                
           }  
           else  
           {  
              $('#di').html('error');                  
           }  
      }); 
       $('#district').change(function(){
            
           var txt = $(this).val();  
           if(txt != '')  
           {    
                $.ajax({  
                     url:"data.php?id=1",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#tables').html(data);  
                     }  
                });  
           }  
           else  
           {  
              $('#di').html('error');                  
           }  
      });
    $('#bg').change(function(){
          district=document.getElementById('district').value;  
          if (district<=0) {
            district=0;
            province=document.getElementById('province').value;  
          }else{
           province=document.getElementById('province').value;
          }
           var txt = $(this).val();  
           if(txt != '')  
           {    
                $.ajax({  
                     url:"data.php?d="+district+"&p="+province,  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#tables').html(data);  
                     }  
                });  
           }  
           else  
           {  
              $('#di').html('error');                  
           }  
      });

 }); 
</script>  

</body>
</html>