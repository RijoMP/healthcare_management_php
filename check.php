<?php
if(isset($_SESSION['u_type']))
	{
			if($_SESSION['u_type']!="user")
			{
			header("location:index.php");
			}
	}	
			?>