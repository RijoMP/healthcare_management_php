<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medilab </title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- ======================================================
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="" id="lihome"><a href="index.php">Home</a></li>
                <li class="" id="liserve"><a href="services.php">Services</a></li>
               <li class="" id="licontact"><a href="contact.php">Contact</a></li>

<?php
session_start(); 

if(isset($_SESSION['u_type']))
	{
if($_SESSION['u_type']!="user")
			{
				
			echo '<li class=""><a href="login.php">Login/Register</a></li>';
			}
			else 
				{
					
				echo '  ';
				}}
				else 
				{
				echo '<li class=""><a href="login.php">Login/Register</a></li>';
				}
				?>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="img/logo.png" class="img-responsive">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">Healthcare at your desk!!</h1>
              

              </div>
            <div class="overlay-detail text-center" id="foc"><script>window.location.hash = 'foc';</script>
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
<?php

if(isset($_SESSION['u_type']))
	{
		if($_SESSION['u_type']=="user")
			{
				echo '
         
            <button class="btn btn-warning" ><a href="history.php">History</a></button>
             <button class="btn btn-warning" ><a href="logout.php" >Logout</a></button>';
				}
  }
?>



