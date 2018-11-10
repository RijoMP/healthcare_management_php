<form method="post" id="f1" action="">
			<div class="container d">
				<div class="row">
					 <?php 
					require("../classes/dataaccess.class.php");
					$dao=new DataAccess();
					echo "<input type='hidden' name='d_id' value='".$_POST['d_id']."'>"; 
					$con="d_id='".$_POST['d_id']."'";
					echo $con;
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<h4>Edit DOCTOR</h4>
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
					<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">
						<input type="text" id="name" class="form-control" name="name" required value="<?php echo $dao->getScalar('d_name','doctor',$con); ?>">
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
						<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">
						<textarea id="address"  class="form-control" name="address" required><?php echo $dao->getScalar('d_adrs','doctor',$con); ?></textarea>
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
						<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">
						<div  >
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<label><input type="radio" id="gender" name="gender" value="male"  required      <?php if($dao->getScalar('d_gender','doctor',$con)=='male') echo "checked"; ?>       />Male</label>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<label><input type="radio" id="gender" name="gender" value="female"  required  <?php if($dao->getScalar('d_gender','doctor',$con)=='female') echo "checked"; ?>  />Female</label>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
								<label><input type="radio" id="gender" name="gender" value="transgender" required <?php if($dao->getScalar('d_gender','doctor',$con)=='transgender') echo "checked"; ?>  />Transgender</label>
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
					<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">
						<div>
				<input type="date"  class="form-control" id="dob"name="dob" required value="<?php echo $dao->getScalar('d_dob','doctor',$con); ?>"/>
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
				<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">	<div>
				<input type="date" class="form-control"  id="doj"name="doj" required value="<?php echo $dao->getScalar('d_doj','doctor',$con); ?>"/>
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
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">		<input type="text" id="phno"  class="form-control" name="phno" required value="<?php echo $dao->getScalar('d_phno','doctor',$con); ?>">
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
				<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">		<input type="text" id="qua"  class="form-control" name="qua" required value="<?php echo $dao->getScalar('d_qua','doctor',$con); ?>">
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
					<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">	<textarea id="wexp"  class="form-control"  name="wexp" required><?php echo $dao->getScalar('d_wexp','doctor',$con); ?></textarea>
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
					<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">	<select name="dept"  class="form-control"  required>
						<option selected="selected" disabled="disabled">Select Department Here</option>
						<option value="1" <?php if($dao->getScalar('d_dept','doctor',$con)=='1') echo "selected"; ?> >Orthology</option>
						
						<option value="2" <?php if($dao->getScalar('d_dept','doctor',$con)=='2') echo "selected"; ?> >Nephrology</option>
						<option value="3" <?php if($dao->getScalar('d_dept','doctor',$con)=='3') echo "selected"; ?> >Neurology</option>
						<option value="4" <?php if($dao->getScalar('d_dept','doctor',$con)=='4') echo "selected"; ?> >Pediatrics</option>
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
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 c3">		<input type="email" id="email"  class="form-control"  name="email" disabled value=<?php echo $dao->getScalar('d_email','doctor',$con); ?>>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 c4" id="erremail">
					
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
						<input type="submit" id="add" class="btn btn-primary form-control" name="add" value="Update">
					</div>
				
					<div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 c5">
					
					</div><script>
						$(document).ready(function(){
					$('#identicalForm').bootstrapValidator({feedbackIcons:{valid:'glyphicon glyphicon-ok', invalid: 'glyphicon glyphicon-remove', validating: 'glyphicon glyphicon-refresh' }, fields: { password: { validators: { identical: { field: 'confpwd', message: 'The password and its confirm are not the same' } } }, confpwd: { validators: { identical: { field: 'pwd', message: 'The password and its confirm are not the same' } } } } });
					
					
					</script>
				</div>
			</div>
		</form>
