 <?php  require("header.php");
require("../classes/dataaccess.class.php");
$dao=new DataAccess();
$msg="&nbsp;";

if(isset($_POST['add']))
	{
		$field=array("d_name"=>$_POST['name'],"d_adrs"=>$_POST['address'],"d_gender"=>$_POST['gender'],"d_dob"=>$_POST['dob'],"d_doj"=>$_POST['doj'],"d_phno"=>$_POST['phno'],"d_qua"=>$_POST['qua'],"d_wexp"=>$_POST['wexp'],"d_dept"=>$_POST['dept']);
		$dao->update($field,'doctor','d_id="6"');
	}







?>
                            <form method="post" class="tm-search-form ">
                                <div class="form-row tm-search-form-row">                                
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                    <td width="20px"><div class="col-md-4 ">        &nbsp</div>&nbsp
                                    <div class="form-group tm-form-group tm-form-group-1">                                    
                                    <div id="editform">
</div>
<div class="form-group tm-form-group tm-form-group-pad tm-form-group-2"><strong><h5>Edit details of a Doctor</h5></strong><br>
                                          
                                          
                      
                                                                           
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
                                        </div></form>   
                                  <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="btnSubmit">&nbsp;</label>				<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3"></div>
                                        <input  type="button" class="btn btn-primary form-control " id="edit" name="edit" value="Edit Doctor">
                                    </div>
                                    </div>
                                </div> <!-- form-row -->
                                               
                            






<script>
		var xmlhtobj;
		var xmlhtobj1;
    
   if(window.XMLHttpRequest)
   {
		xmlhtobj=new XMLHttpRequest();
		xmlhtobj1=new XMLHttpRequest();
   }
   else
   {
		xmlhtobj=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhtobj1=new ActiveXObject("Microsoft.XMLHTTP");
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
	
	document.getElementById("edit").onclick=function(){
   xmlhtobj1.onreadystatechange=function(){
   
		//alert(xmlhtobj1.responseText);
		if(xmlhtobj1.readyState==4 && xmlhtobj1.status==200)
		{
			document.getElementById("editform").innerHTML=xmlhtobj1.responseText;
		}
	
	
	};
	var data="d_id="+document.getElementById("doctor").value;
	//alert(xmlhtobj.responseText);
	xmlhtobj1.open("POST","loadmoddoc.php",true);
	xmlhtobj1.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xmlhtobj1.send(data);
	};
	
	</script>


<?php  require("footer.php");
?>