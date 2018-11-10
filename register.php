,<?php
	
require("classes/dataaccess.class.php");
$dao=new DataAccess();
session_start();
$msg="";
			
if(isset($_POST['register']))
{
	$doj=time();
	$fieldArray=array("",$_POST['name'],$_POST['email'],$_POST['address'],$_POST['dob'],$_POST['gender'],$_POST['blood'],$doj,"active");
		if( $_POST['pass']== $_POST['cpass'])
		{
			if($dao->insertFull($fieldArray,"user"))
			{	
				$pwd=$_POST['pass'];
				$uname=$_POST['email'];
				$fieldarray1=array("",$uname,$pwd,"user","active");
				if($dao->insertFull($fieldarray1,"login"))
				{
					header("location: login.php");
				}
				else
				{
					$msg="db error";
				}
			}
			else
			{
				$msg="db error";
			}
		
		}
		else
		{
			$msg="Password mismatch";
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

    <title>Register</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body" >
	<div class="alert alert-warning">
  
		<?php
			if($msg!="")
			{
				echo"<strong>Warning!</strong><br>";
			echo $msg;
			}
			?></div>
          <form method="post" action=""><table class=" mx-auto mt-5 ,">
					<tr><th>
 						<label for="name">Name</label></th><td>
                    <input type="text" id="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>" class="form-control" placeholder="Name" required="required" autofocus="autofocus" name="name">
                  </td>
					 </tr>
					
					
					
					<tr><th>
 						<label for="address">Address</label></th><td>
                    <textarea id="address" name="address" class="form-control" placeholder="Address" required="required" ></textarea>
                  
					 </tr>
					
						<tr><th>
 						<label for="email">Email</label></th><td>
                    <input type="email" id="email" class="form-control" placeholder="example@mail.com" required="required" name="email" >
                  </td>
					 </tr>
					
					<tr><th>
 						<label for="dob">Date of<br>birthd</label></th><td>
                    <input type="date" id="dob" name="dob" class="form-control" placeholder="DOB" required="required" autofocus="" onClick="">
                  </td>
					 </tr>
					
					<tr><th>
 						<label for="gender">Gender</label></th><td>
                  Male  <input type="radio" id="gender" class=""  required="required" name="gender" value="male">
                Female<input type="radio" id="gender" class=""  required="required" name="gender" value="female">
                 TG <input type="radio" id="gender" class=""  required="required" name="gender" value="tg">
                  

  </td>
					 </tr>
					
					
					<tr><th>
 						<label for="blood">Blood Group</label></th><td>
						<select name="blood" class=" form-control" required>
              <option  disabled selected>Choose</option>
			   <option value="A+">A+</option>
				 <option value="A-">A-</option>
				 <option value="B+">B+</option>
				 <option value="B-">B-</option>
 				<option value="AB+">AB+</option>
 				<option value="AB-">AB-</option>
				 <option value="O+">O+</option>
 				<option value="O-">O-</option>
					</select>

               
  </td>
					 </tr>
					
					
					
					
					<tr><th>
 						<label for="pass">Password</label></th><td>
                    <input type="password" id="pass" name="pass" class="form-control" required="required">
                  </td>
					 </tr>
					
						<tr><th>
 						<label for="cpass">Confirm Password</label></th><td>
                    <input type="password" id="cpass" name="cpass" class="form-control" required="required">
                  </td>
					 </tr>
					
					 <tr><td>&nbsp</td>
					 </tr>
                

 </table>
   <input type="submit" class="btn btn-primary offset-4 col-4"  value="register" name="register"/>
     	
      </form>&nbsp<br>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>
          
          </div>
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
