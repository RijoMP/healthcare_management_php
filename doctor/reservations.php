<?php  require("header.php");

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
		
	if(isset($_POST['diagnose']))
	{
	header("location:diagnose.php?res_id=".$_POST['res_id']."&d_id=".$_SESSION['uname']."&res_uname=".$_POST['res_uname']);
	}	
	if(isset($_POST['cancel']))
	{
	$up="update reservation set res_status='canceled' where res_id='".$_POST['res_id']."'";
	echo $_POST['res_id'];
	mysqli_query($conn,$up);
	}	

		
$sql1="SELECT res_id,res_uname,res_date,res_status FROM reservation where res_status='pending' and res_date='".date('Y-m-d')."'order by 'res_id' DESC ";
$result = mysqli_query($conn, $sql1);
if(mysqli_num_rows($result)>0) 
	{
	while($row=mysqli_fetch_assoc($result))
	{
	$msg1=$msg1."<tr><form action='' method='post'><td>".$row['res_id']." </td><td>".$row['res_uname']."<input type='hidden' value='".$row['res_uname']."' name='res_uname'></td><td>".$row['res_date']."</td><td>".$row['res_status']."</td><td><input type='hidden' value='".$row['res_id']."' name='res_id'><input type='submit' name='diagnose' class='btn btn-success form-control' value='Diagnose'><br><input type='submit' name='cancel' class='btn btn-danger form-control' value='Cancel'></form></td></tr>";
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
              Reservations</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Res ID</th>
                      <th>Name</th>
                      <th>Date</th>
                       <th>Status</th>
                       <th>Diagnose/Cancel</th>
                      
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

<?php
//echo $msg;
?>	
						

     


<?php  require("footer.php");
?>