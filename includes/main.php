<?php 
include('includes/db.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student acommodation | Come to your desired location | Book Hostle & Room::</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

<link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 


</head>

<body>

  <!--Top Header Start-->
  <div id="demo-1" data-zs-src='["images/001.jpg"]' >
		<div class="demo-inner-content">
			
          <div class="container">

            <div class="col-md-3 logo"><a href="index.html"><img src="images/logo.png" class="img-responsive" /></a></div>
            
            <div class="col-md-7 col-md-offset-2"><!--Main Menu Start-->
              
              <nav class="navbar navbar-default top-margin" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
     <?php include_once 'navbar.php'; ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
            
            </div> <!--Main Menu End-->     

          </div>
          
          <div class="clearfix"></div>
          
          <div class="container top-bann">
          
            <div class="col-md-12">
            
              <div class="banner-head-small">Find a home in Pakistan best student cities</div>
              
              <div class="banner-head-big">Need Us!!</div>
              
              <div class="banner-form">
              
                <div class="row">
                
                
                <div class="col-md-3">
                  
                  </div>
             
                <div class="col-md-6">
                <form method="get" action="result.php" enctype="multipart/form-data" >
                  <input type="text" class="form-control" name="user_query" placeholder="Search Place"/>
                       
              
                   
                  </div>
                  
                  <div class="col-md-2">
                  
                    <button type="submit" class="red-btn-fluid"  name="search" value="search">Search</button>
                    </form>
                  </div>
                  
                  </form>
                
                </div>
              
              </div>
              
              <br />
            
            </div>
          
          </div>
            
		</div>
        
	</div><!--Top Header End-->