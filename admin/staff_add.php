<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['u_type']))
	{
		header("location:../index.php");
	}
require("../classes/dataaccess.class.php");
$dao=new DataAccess();
$msg="";
$options=$dao->getOptions("distinct(sub_name)","sub_name","subjects","1");
if(isset($_POST['add']))
{
	/*$yeardob=$_POST['dobyear'];
	$monthdob=$_POST['dobmonth'];
	$daydob=$_POST['dobday'];*/
	$dob=mktime(0,0,0,$_POST['dobmonth'],$_POST['dobday'],$_POST['dobyear']);

	/*$yeardoj=$_POST['dojyear'];
	$monthdoj=$_POST['dojmonth'];
	$daydoj=$_POST['dojday'];*/
	$doj=mktime(0,0,0,$_POST['dojmonth'],$_POST['dojday'],$_POST['dojyear']);

	$typeArr=array("image/jpeg","image/png","image/gif");
	$picname=$dao->fileUpload($_FILES['pic'],500,$typeArr,"files");

	$fieldArray=array("",$_POST['name'],$_POST['gender'],$_POST['qualification'],$_POST['subject'],$dob,$doj,$_POST['email'],$_POST['wexp'],$_POST['phno'],$_POST['addr'],$picname,"active",$_POST['section']);
	if($dao->insertFull($fieldArray,"staff"))
	{	
			$msg="Success";
	}
	else
	{
		$msg="db error";
	}
}
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist//css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/style.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist//css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap-3.3.5-dist//js/bootstrap.min.js"></script>
<?php
include("header.php");
?>
<html>
  <head>
	<style>
			.d
			{
			
			border-bottom-style:ridge;
			margin-bottom:10px;
			
			}
			.row
			{
			margin-bottom:8px;
			}
	</style>
  </head>
	<body>
		<form method="post" id="f1" action="" enctype="multipart/form-data">
			<div class="container d">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<h2>ADD NEW STAFF</h2>
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
						<input type="text" id="name" class="formControl" name="name">
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
						<label>Qualification Level</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<textarea id="qualification" class="formControl" name="qualification"></textarea>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errqualification">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				<div class="row r11">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Subject</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<select name="subject" class="formControl">
									<option selected="selected" disabled="disabled">Select Subject Here</option>
									<?php
										echo $options; 
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errabout">
					
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
							<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<label><input type="radio" id="gender" name="gender" value="male"/>Male</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<label><input type="radio" id="gender" name="gender" value="female"/>Female</label>
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
							<select name="dobyear" style="width:82px;">
								<option selected="selected" disabled="disabled">year</option>
								<?php 
									if(isset($_POST['dobyear']))
									{
										echo "<option selected='selected'>".$_POST['dobyear']."</option>";
									}
									$startyr=1980;
									$lastyr=2020;
									$i=$startyr;
									while($i<=$lastyr)
									{
										echo "<option>$i</option>";
										$i++;
									}
								?>
							</select>
							<select name="dobmonth" style="width:82px;">
										<option selected="selected" disabled="disabled">month</option>
										<?php
										$months=array("1"=>"JAN","2"=>"FEB","3"=>"MAR","4"=>"APRIL","5"=>"MAY","6"=>"JUNE","7"=>"JULY","8"=>"AUGUST","9"=>"SEP","10"=>"OCT","11"=>"NOV","12"=>"DEC");
										foreach($months as $ind=>$monthname)
											{
												if(isset($_POST['dobmonth']))
												{
													if($_POST['dobmonth']==$ind)
													{
														echo "<option selected='selected' value='$ind'>$monthname</option>";
													}
													else
													{
														echo "<option value='$ind'>$monthname</option>";
													}
												}
												else
												{
													echo "<option value='$ind'>$monthname</option>";
												}
											}
										?>
							</select>
							<select name="dobday" style="width:82px;">
								<option selected="selected" disabled="disabled">day</option>
									<?php 
										if(isset($_POST['dobday']))
										{
											echo "<option selected='selected'>".$_POST['dobday']."</option>";
										}
										$i=1;
										while($i<=31)
										{
											echo"<option>$i</option>";
											$i++;
										}
									?>
							</select>
						</div>
						
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				<div class="row r5">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Date of Joining</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<div>
							<select name="dojyear" style="width:82px;">
								<option selected="selected" disabled="disabled">year</option>
								<?php 
									if(isset($_POST['dojyear']))
									{
										echo "<option selected='selected'>".$_POST['dojyear']."</option>";
									}
									$startyr=date("Y")-35;
									$lastyr=date("Y")-18;
									$i=$startyr;
									while($i<=$lastyr)
									{
										echo "<option>$i</option>";
										$i++;
									}
								?>
							</select>
							<select name="dojmonth" style="width:82px;">
										<option selected="selected" disabled="disabled">month</option>
										<?php
										$months=array("1"=>"JAN","2"=>"FEB","3"=>"MAR","4"=>"APRIL","5"=>"MAY","6"=>"JUNE","7"=>"JULY","8"=>"AUGUST","9"=>"SEP","10"=>"OCT","11"=>"NOV","12"=>"DEC");
										foreach($months as $ind=>$monthname)
											{
												if(isset($_POST['dojmonth']))
												{
													if($_POST['dojmonth']==$ind)
													{
														echo "<option selected='selected' value='$ind'>$monthname</option>";
													}
													else
													{
														echo "<option value='$ind'>$monthname</option>";
													}
												}
												else
												{
													echo "<option value='$ind'>$monthname</option>";
												}
											}
										?>
							</select>
							<select name="dojday" style="width:82px;">
								<option selected="selected" disabled="disabled">day</option>
									<?php 
										if(isset($_POST['dojday']))
										{
											echo "<option selected='selected'>".$_POST['dojday']."</option>";
										}
										$i=1;
										while($i<=31)
										{
											echo"<option>$i</option>";
											$i++;
										}
									?>
							</select>
						</div>
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
						<input type="text" id="email" class="formControl" name="email">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="erremail">
					
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
						<textarea id="wexp" class="formControl" name="wexp"></textarea>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errwexp">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				
				<div class="row r8">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Section</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<select name="section" class="formControl">
						<option selected="selected" disabled="disabled">Select Section Here</option>
						<option>LP</option>
						<option>UP</option>
						<option>HS</option>
						<option>HSS</option>
						</select>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				<div class="row r9">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Contact No.</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="text" id="phno" class="formControl" name="phno">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errphno">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				<div class="row r10">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>Address</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<textarea id="addr" class="formControl" name="addr"></textarea>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="erraddr">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				<div class="row r12">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						<label>photo</label>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="file" id="pic" class="formControl" name="pic">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="errpic">
					
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div>
				</div>
				<div class="row r13">
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c1">
					
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c2">
						
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">
						<input type="submit" id="add" class="btn btn-primary" name="add" value="submit">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4">
					
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
					<?php
					 if(isset($msg))
					 {
					 echo $msg;
					 }
					?>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4">
					
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
				</div>
			</div>
		</form>
		<script>
			document.getElementById("f1").onsubmit=function(){
			var flag=true;
				
				if(document.getElementById("name").value=="")
				{
				
					document.getElementById("errname").innerHTML="<p>Required</p>";
					flag=false;
				}
				else if(document.getElementById("name").value.length<3)
				{
					document.getElementById("errname").innerHTML="<p>Min 3 Letters</p>";
					flag=false;
				}
				else
				{
					document.getElementById("errname").innerHTML="";
				}
				
				var gender=document.getElementsByName("gender");
				if(gender[0].checked)
				{
					if(gender[0].value!='male')
					{
						document.getElementById("errgender").innerHTML="Inavlid Gender";
						flag=false;
					}
					else
					{
						document.getElementById("errgender").innerHTML="";
					}
				}
				else if(gender[1].checked)
				{
					if(gender[1].value!='female')
					{
						document.getElementById("errgender").innerHTML="Inavlid Gender";
						flag=false;
					}
					else
					{
						document.getElementById("errgender").innerHTML="";
					}
				}
				else
				{
					flag=false;
					document.getElementById("errgender").innerHTML="Please Select a Value";
				}
				
				if(document.getElementById("qualification").value=="")
				{
				
					document.getElementById("errqualification").innerHTML="<p>Required</p>";
					flag=false;
				}
				else
				{
					document.getElementById("errqualification").innerHTML="";
				}
					
					
				if(document.getElementById("email").value=="")
				{
				
					document.getElementById("erremail").innerHTML="<p>Required</p>";
					flag=false;
				}
				else
				{
					document.getElementById("erremail").innerHTML="";
				}
				
				if(document.getElementById("wexp").value=="")
				{
				
					document.getElementById("errwexp").innerHTML="<p>Required</p>";
					flag=false;
				}
				else
				{
					document.getElementById("errwexp").innerHTML="";
				}
				
				if(document.getElementById("phno").value=="")
				{
				
					document.getElementById("errphno").innerHTML="<p>Required</p>";
					flag=false;
				}
				else
				{
					document.getElementById("errphno").innerHTML="";
				}
				
				if(document.getElementById("addr").value=="")
				{
				
					document.getElementById("erraddr").innerHTML="<p>Required</p>";
					flag=false;
				}
				else
				{
					document.getElementById("erraddr").innerHTML="";
				}
				
				if(document.getElementById("about").value=="")
				{
				
					document.getElementById("errabout").innerHTML="<p>Required</p>";
					flag=false;
				}
				else
				{
					document.getElementById("errabout").innerHTML="";
				}
				
				if(document.getElementById("pic").value=="")
				{
				
					document.getElementById("errpic").innerHTML="<p>Required</p>";
					flag=false;
				}
				else
				{
					document.getElementById("errpic").innerHTML="";
				}
				

			return flag;
			};
		</script>
	</body>
</html>