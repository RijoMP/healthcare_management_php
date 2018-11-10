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


	if(isset($_POST['unblock']))
	{
	$up="update doctor set d_status='active' where d_id='".$_POST['d_id']."'";
	echo $_POST['d_id'];
	mysqli_query($conn,$up);
	}	
	if(isset($_POST['delete']))
	{
	$up="update doctor set d_status='deleted' where d_id='".$_POST['d_id']."'";
	echo $_POST['d_id'];
	mysqli_query($conn,$up);
	}	
		
$sql1="SELECT d_id,d_name,dep_name FROM doctor,department where doctor.d_dept=department.dep_id and doctor.d_status='blocked' ";
$result = mysqli_query($conn, $sql1);
if(mysqli_num_rows($result)>0) 
	{
	while($row=mysqli_fetch_assoc($result))
	{
	$msg1=$msg1."<tr><form action='' method='post'><td>".$row['d_id']." </td><td>".$row['d_name']."</td><td>".$row['dep_name']."</td><td><input type='hidden' value='".$row['d_id']."' name='d_id'><input type='submit' name='unblock' class='btn btn-warning form-control' value='Unblock'><br><input type='submit' name='delete' class='btn btn-danger form-control' value='Delete'></form></td></tr>";
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
              Active Doctors</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Department</th>
                       <th>Unblock/Delete</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
<?php echo $msg1; ?>
                   
                 
                
                
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