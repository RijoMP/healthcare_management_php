 <?php  require("header.php");
require("classes/dataaccess.class.php");
$dao=new DataAccess();
$msg="&nbsp;";
$one=date("M \t d ",time());
$two=date("M \t d ",time()+86400);
$three=date("M \t d ",time()+86400*2);

if(isset($_POST['checkavail']) || isset($_SESSION['doc']))

{		if(isset($_POST['checkavail']))
		{
			$date=$_POST['date'];
			$doctor=$_POST['doctor'];
		}
		else if(isset($_SESSION['doc']))
		{
			$date=$_SESSION['date'];
			$doctor=$_SESSION['doc'];
			unset($_SESSION['date']);
			unset($_SESSION['doc']);
		}
		echo "<br>";
		$dbdate=date("Y-m-d",$date);
		$con="res_did='".$doctor."' and res_date='".$dbdate."'";
		$count=$dao->getScalar("count(*)","reservation",$con);
		if($count>=2)
			{
				echo "<div class='alert alert-warning col-2' >No appointments available</div>";
			}
		else if(!isset($_SESSION['u_type']))
			{
				$_SESSION['doc']=$doctor;
				$_SESSION['date']=$date;
					echo "<div class='alert alert-success' >Appointment is available..please login  <a href='login.php'><button class='btn btn-danger'>Login or Register</button></a></div>";
			
					}
			else 	if(isset($_SESSION['u_type']))
				{
				if($_SESSION['u_type']='user')
				echo "<div class='alert alert-success' >Appointment is available.. <a href='appointment.php?uname=".$_SESSION['uname']."&did=".$doctor."&date=".$dbdate."'><button class='btn btn-success'>Book now!</button></a></div>";
				else
					{
							echo "Appointment is available...You need a User login";
						
						}	
				}
}


?>

<table background="img/Chaplin.jpg">
                            <form action="" method="post" class="tm-search-form ">
                                <div class="form-row tm-search-form-row">                                
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                   <tr> <td width="20px"><div class="col-md-4 ">        &nbsp</div>&nbsp</td><td>&nbsp</td><td>
                                    <div class="form-group tm-form-group tm-form-group-1">                                    
                                    
<div class="form-group tm-form-group tm-form-group-pad tm-form-group-2"><strong><h3>Check availability of Appointment</h3></strong><br><br><br>
                                            <label for="date">Which Date?</label>
                                            <select name="date" class="form-control tm-select" id="date" required>
                                                <option value="" selected disabled>Choose Date</option>
                                                <option value="<?php  echo  time();?>"><?php  echo $one ?></option>
                                                <option value="<?php  echo time()+86400;?>"><?php  echo $two ?></option>
                                                <option value="<?php  echo  time()+86400*2;?>"><?php  echo $three ?></option>
                                          
                      
                                            </select>                                        
                                        </div>

    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <label for="dept">Which Department?</label>
                                            <select name="dept" class="form-control tm-select" id="dept" required>
                                                <option value="" selected disabled>Choose </option>
<?php echo  $dao->getOptions("dep_id","dep_name", "department","dep_status='active'" ) ;  ?>
                                               
                                            </select>                                        
                                       </div><div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <label for="doctor">Which Doctor?</label>
                                            <select name="doctor" class="form-control tm-select" id="doctor" required>
                                               <option value="" selected disabled>Please select Department</option>
                                            </select>                                        
                                        </div>
                                  
                                    </div>
                                </div> <!-- form-row -->
                                <div class="form-row tm-search-form-row">

                                
                                   
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="btnSubmit">&nbsp;</label>
                                        <input type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="checkavail" name="checkavail" value="Check Availability"/>
                                    </div>
                                </div>                              
                            </form>          </td>               </tr>
</table>
                        </div>





<script>
		var xmlhtobj;
    
   if(window.XMLHttpRequest)
   {
		xmlhtobj=new XMLHttpRequest();
   }
   else
   {
		xmlhtobj=new ActiveXObject("Microsoft.XMLHTTP");
   }
   document.getElementById("dept").onchange=function(){
   xmlhtobj.onreadystatechange=function(){
   
		//alert(xmlhtobj.responseText);
		if(xmlhtobj.readyState==4 && xmlhtobj.status==200)
		{
			document.getElementById("doctor").innerHTML="<option selected='selected' disabled='disabled'>Choose</option>"+xmlhtobj.responseText;
		}
	
	
	};
	var data="dept="+document.getElementById("dept").value;
	//alert(xmlhtobj.responseText);
	xmlhtobj.open("POST","loaddoctor.php",true);
	xmlhtobj.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xmlhtobj.send(data);
	};
	
	
	</script>


<?php  require("footer.php");
?>