<?php
require("../classes/dataaccess.class.php");
$dao=new DataAccess();

if(isset($_POST['add']))
{
	$msg="";
	$name=$_POST['name'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$doj=$_POST['doj'];
	$phno=$_POST['phno'];
	$qua=$_POST['qua'];
	$wexp=$_POST['wexp'];
	$email=$_POST['email'];
	$dept=$_POST['dept'];
	$pwd=$_POST['pwd'];
	$confpwd=$_POST['confpwd'];
	$fieldArray=array("",$name,$address,$gender,$dob,$doj,$phno,$qua,$wexp,$email,$dept,"active");
	$con="d_email='".$email."'";
	$mailcheck=$dao->getScalar('d_email','doctor',$con);
	if($mailcheck==$email)
		{
			$msg="".$mailcheck." is already exists" ;
		}
	else if( $pwd== $confpwd)
	{
		if($dao->insertFull($fieldArray,"doctor"))
		{	
			$pwd=$_POST['pwd'];
			$uname=$_POST['email'];
			$fieldarray1=array("",$uname,$pwd,"doctor","active");
			if($dao->insertFull($fieldarray1,"login"))
			{
				$msg="Dr ".$name." is Successfully Added" ;
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

require("header.php")

?>

<form method="post" id="f1" action="" enctype="multipart/form-data">
			<div class="container d">
				<div class="row">
					 <?php if(isset($msg))
						{
						
					echo '<div  id="diverr" class="alert alert-success col-md-8 col-sm-8 col-xs-8 col-lg-8 c4">';
					echo $msg;} 
					echo '</div>';
					?>
				
				
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<h4>ADD NEW DOCTOR</h4>
					</div>
				</div>
			</div>
			<div class="container d">
				<div class="row r1">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Name</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="text" id="name" class="form-control" name="name" required>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errname">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
					<div class="row r2">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Address</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<textarea id="address" class="form-control" name="address" required></textarea>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="erraddress">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				<div class="row r3">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">

					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Gender</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<div class="formControl">
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<label><input type="radio" class="radio-group" id="gender" name="gender" value="male"  required/>Male</label>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<label><input type="radio" class="radio-group" id="gender" name="gender" value="female"  required/>Female</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
								<label><input type="radio" class="radio-group" id="gender" name="gender" value="transgender" required/>Transgender</label>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errgender">
						
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
						
					</div>
				</div>
				
				
				<div class="row r4">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Date of birth</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<div>
				<input type="date" id="dob" class="form-control" name="dob" required/>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
						
						
					
				<div class="row r4">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Date of Joining </label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<div>
				<input type="date" id="doj" class="form-control" name="doj" required/>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
						
							<div class="row r11">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Contact No.</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="text" id="phno"  class="form-control" name="phno" required>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errphno">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				<div class="row r1">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Qualification</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="text" id="qua"  class="form-control"  name="qua" required>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errname">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				
				
				
				<div class="row r7">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Working Experience</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<textarea id="wexp"  class="form-control" name="wexp" required></textarea>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errwexp">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				
						
				
				
				
		
			
				
				
				<div class="row r10">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Department</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<select name="dept"  class="form-control" required>
						<option selected="selected" disabled="disabled">Select Department Here</option>
						<option value="1">Orthology</option>
						
						<option value="2">Nephrology</option>
						<option value="3">Neurology</option>
						<option value="4">Pediatrics</option>
						</select>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				<div class="row r6">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Email</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="email" id="email"  class="form-control" name="email" required>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="erremail">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				
				
					<div class="row r8">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Password</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="password" id="pwd"  class="form-control" name="pwd" required>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errpwd">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				<div class="row r9">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Confirm Password</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="password" id="confpwd"  class="form-control"  name="confpwd" required>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errconfpwd">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				
				<div class="row r15">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="submit" id="add" class="btn btn-primary" name="add" value="submit">
					</div>
				
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
			</div>
		</form>

<?php
require("footer.php")

?>



