
<?php
require("classes/dataaccess.class.php");
$dao=new DataAccess();
session_start();
$msg="&nbsp;";

if(isset($_SESSION['uname'])&& isset($_SESSION['u_type']))// check whether already logged in
	 {
			if($_SESSION['u_type']=="admin")
			{
			  header("location:admin");
			}
			else if($_SESSION['u_type']=="head")
			{
			  header("location:head");	
			}
			else if($_SESSION['u_type']=="doctor")
			{
			  header("location:doctor");
			}
			else if($_SESSION['u_type']=="staff")
			{
			 header("location:staff");
			}
			else if($_SESSION['u_type']=="user")
			{
			header("location:index.php");
			}
	 }

        if(isset($_POST['login']))
		 {
				 $username=$_POST['uname'];
				 $u_type=$dao->getScalar("log_utype","login","log_uname='$username'" );
			
				 
					$pwd=$dao->getScalar("log_pwd","login","log_uname='$username'" );
					
					if($pwd==$_POST['pwd'])
						{
						$_SESSION['uname']=$_POST['uname'];
						$_SESSION['u_type']=$u_type;
						
								if($u_type=="admin")
									{
										 header("location:admin/index.php");
									}
								else if($u_type=="doctor")
									{
										 header("location:doctor/index.php");	
									}
								else if($u_type=="head")
									{
										header("location:head/index.php");
									}
								else if($u_type=="user")
									{
										
										if(isset($_SESSION['doc']) && isset($_SESSION['date']))
											{
											
										 header("location:checkavailability.php");
										}
										else
										header("location:index.php");
									}
								if(isset($_POST['remember']))
									 {
										 setcookie("uname",$_POST['uname'],time()+30);
										 setcookie("u_type",$usrtype,time()+30);
									 }
						
					}
				  else
					  {
						  $msg="<div class='alert-danger'>Invalid Username or Password</div>";
					  }
			 		
		 }
		
?>








<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
<style> body { background-color: black; } </style>

  </head>

  <body>

    <div class="container" >
      <div class="card card-login mx-4 mt-5">
        <div class="card-header">Login</div>
        <div class="card-body ">
          <form method="post" action="">
		
	<?php	echo $msg;
			echo "<br>";		?>
			
            <div class="form-group ">
              <div class="form-label-group">
                <input type="text" id="" class="form-control validate-input" placeholder="User name" required="required" autofocus="autofocus" name="uname">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control validate-input" placeholder="Password" required="required" name="pwd">
              
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Login" name="login">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div><a href="index.php" class="btn btn-success btn-block mt-3"><font size="3">Back to Home</font></a>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
