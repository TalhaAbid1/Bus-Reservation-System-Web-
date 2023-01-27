<!DOCTYPE html>
<?php
include 'dbConn.php';
?>
<html>
<head>
	  <title>Admin - Dashboard</title>
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	  <link rel="stylesheet" href="css/custom.css"/>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	  <link rel="preconnect" href="https://fonts.gstatic.com">
	  <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300&display=swap" rel="stylesheet">
	  <link rel="preconnect" href="https://fonts.gstatic.com">
	  <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<link rel="shortcut icon" type="image/png" href="res/logo1.png">
<body onload="myword()">
  <div id="loader"></div>

<nav class="navbar navbar-expand-lg  bg-success">
    <a class="navbar-brand text-light" href="#"><img class="logo" src="res/logo.png"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
    <span class="navbar-toggler-icon"></span>
  </button>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-item nav-link text-light" href="adminSign.php"><i class="fa fa-sign-in" aria-hidden="true"></i>  Logout</a>
        </li>
      </ul>
    </div>
</nav><br><br>

    

<h2 class="adm"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Hi Admin!</h2><br>
<body id="tBody">
<div class="container">	
<div class="row">
  <div class="col-sm-3">
        <div class="text-center">
            <img class="dashBus" src="res/1.png">
            </div>
            <div class="text-center ">
            <a href="Admin_BusDetails.php"><button type="submit" class="btn btn-primary">Manage Buses</button></a>
            </div><br>
        </div>
        
        <div class="col-sm-3">
            <div class="text-center">
            <img class="dashS" src="res/2.png">
            </div><br>
            <div class="text-center">
            <a href="Schedule.php"><button type="submit" class="btn btn-primary">Manage Schedules</button></a>
            </div><br>
        </div>
        
        <div class="col-sm-3">
            <div class="text-center">
            <img class="dashC" src="res/3.png">
            </div>
            <div class="text-center">
            <a href="ViewCustomer.php"><button class="btn btn-primary">View Customers</button></a>
            </div><br>
        </div>

        <div class="col-sm-3">
            <div class="text-center">
            <img class="dashR" src="res/4.png">
            </div>
            <div class="text-center">
            <a href="Reservation.php"><button type="submit" class="btn btn-primary">View Reservations</button></a>
            </div>
        </div>
  </div>
  <!-- <img class="hero" src="res/5.png"> -->      
</div>
<br>
<br>

<footer class="bg-success">
  <h5>All Rights Reserved 2021 &copy;</h5>
</footer>
<script> 
  var preload = document.getElementById("loader");
  function myword()
  {
    preload.style.display='none';
  }
</script>

</body>
</html>