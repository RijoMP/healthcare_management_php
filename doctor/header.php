<?php 
require("check.php");
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doctor - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php"><b>Doctor</b>	</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
		</div>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
      
       
        </li>
     
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="reservations.php">
            <i class="fas fa-fw fa-clock"></i>
            <span>Reservations</span></a>
        </li>

<li class="nav-item">
          <a class="nav-link" href="disposed.php">
            <i class="fas fa-fw fa-table "></i>
            <span>Disposed</span></a>
        </li>

<li class="nav-item">
          <a class="nav-link" href="diagnoses.php">
            <i class="fas fa-fw fa-table "></i>
            <span>Diagnoses</span></a>
        </li>



<li class="nav-item">
          <a class="nav-link" href="changepassword.php">
            <i class="fas fa-fw fa-cog fa-spin"></i>
            <span>Change Password</span></a>
        </li>



<li class="nav-item">
          <a class="nav-link" href="../logout.php">
            <i class="fas fa-fw fa-cog fa-spin"></i>
            <span>Logout</span></a>
        </li>

      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><?php echo chop(basename($_SERVER['PHP_SELF']),'.php'); ?></li>
          </ol>