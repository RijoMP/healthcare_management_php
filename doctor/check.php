<?php
session_start();
if($_SESSION['u_type']!="doctor")
			{
				
				echo "not logged in";
			header("location:../index.php");
			}
			
			?>