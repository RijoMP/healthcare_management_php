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
	
$sql1="SELECT d_id,d_name,dep_name,d_phno,d_status FROM doctor,department where doctor.d_dept=department.dep_id and (doctor.d_status='active' or doctor.d_status='blocked') ";
$result = mysqli_query($conn, $sql1);
if(mysqli_num_rows($result)>0) 
	{
	while($row=mysqli_fetch_assoc($result))
	{
	$msg1=$msg1."<tr><td>".$row['d_id']." </td><td>".$row['d_name']."</td><td>".$row['dep_name']."</td><td>".$row['d_phno']."</td><td>".$row['d_status']."</td></tr>";
	}
}
	else
		{
		echo"0 results";
		}
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
                      <th>ID</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Contact</th>
                      <th>Status</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
<?php 
echo $msg1; ?>
                   
                 
                
                
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>

          

        </div>

<?php
//echo $msg;
?>	
						</tbody>
						</table>
             </div></div></div>	
<?php  require("footer.php");
?>