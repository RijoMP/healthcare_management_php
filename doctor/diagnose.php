<?php
  	require("header.php");
	require("../classes/dataaccess.class.php");
?>
<?php
if(isset($_POST['submit']))
	{
	$dao=new DataAccess();
	$f=array('',$_POST['resid'],$_POST['obs'],$_POST['did']);
	$dao->update(array("res_status"=>"diagnosed"), 'reservation','res_id="'.$_POST['resid'].'"');
	if($dao->insertFull($f,'diagnoses'))
		{
echo "<script language='javascript'>alert('Added to the database')</script>";


			header( "refresh:0; url=reservations.php" );
		}
	echo $_POST['resid'];
	echo $_POST['did'];
	}
?>


<strong>
Enter The current Diagnosis </strong>	<br><form action='' method='post'>
<input type='hidden' name='resid' value='<?php echo $_GET['res_id'];  ?>'>
<input type='hidden' name='did' value='<?php echo $_GET['d_id'];  ?>'>

<textarea rows='10' autofocus class='md-textarea form-control' name="obs"></textarea>
<input type="submit" class="btn btn-success" name="submit"><a href="reservations.php">
<div  class="btn btn-primary" >Cancel</div></a></form>


<?php

$msg1="";
$servername="localhost";
$username="root";
$password="";
$dbname="medi";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if(!$conn)
	 {
	die("Connection failed: ".mysqli_connect_error());
	}

$sql1="SELECT doctor.d_name,diagnoses.res_id,reservation.res_did,reservation.res_uname,reservation.res_date,diagnoses.observation FROM reservation,diagnoses,doctor where doctor.d_id=reservation.res_did and reservation.res_id=diagnoses.res_id and reservation.res_status='diagnosed' and reservation.res_uname='".$_GET['res_uname']."'order by 'diagnoses.res_id' DESC ";
echo $sql1;
$result = mysqli_query($conn, $sql1);
if(mysqli_num_rows($result)>0) 
	{
	while($row=mysqli_fetch_assoc($result))
	{
	$msg1=$msg1."<tr><td>".$row['res_id']." </td><td>".$row['d_name']."</td><td>".$row['res_date']."</td><td>".$row['observation']."<input type='hidden' value='".$row['res_id']."' name='res_id'></td></tr>";
	}
}
	else
		{
		echo"0 results";
		}

		
		
mysqli_close($conn);



?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              History</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Res ID</th>
                      <th>Doctor</th>
                      <th>Date</th>
                       <th>Observation</th>
                       
                      
                    </tr>
                  </thead>
                  
                  <tbody>
<?php $msg1=chop($msg1,"");echo $msg1; ?>
                   
                 
                
                
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">

          

        </div></div>








<?php  require("footer.php");



?>