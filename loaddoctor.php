<?php
require("classes/dataaccess.class.php");
$dao=new DataAccess();
if(isset($_POST['dept']))
{
$con="d_dept='".$_POST['dept']."' and d_status='active'";
echo $dao->getOptions("d_id","d_name","doctor","$con");
}

?>