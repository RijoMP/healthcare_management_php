<?php
session_start();
if($_SESSION['u_type']!="admin")
			{
				
				echo "not logged in";
			header("location:../index.php");
			}
			
			?>