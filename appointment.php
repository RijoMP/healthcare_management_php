<html><head><style>
body {
   background-image:url("cha.gif");
   background-color:#cccccc;
}
</style>

</head>
<body>
<?php
require("classes/dataaccess.class.php");
$dao=new DataAccess();
$msg="&nbsp;";



if(isset($_GET['uname']) && isset($_GET['did']) && isset($_GET['date']))
	{
			$arr=array("",$_GET['uname'],$_GET['did'],$_GET['date'],"pending");
			$dao->insertFull($arr,'reservation');
			echo"<h1>Thanks.....</h1><br><h2> To view your Appointments and History visit your Profile</h2>";
			header( "refresh:5; url=index.php" );
exit();
			
			
	}
	else
		{
				header("location: index.php");
		}
		
		
		
?></body></html>


