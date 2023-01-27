<!DOCTYPE html>
<?php  
include 'dbConn.php';
?>
<html>
<head>
	<title>Admin - Bus Details</title>
	<link rel="stylesheet" href="css/bootstrap.min.css?v=<?php echo time(); ?>"/>
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
  	<div id="navb" class="navbar-collapse collapse hide">
    	<ul class="navbar-nav">
      		<li class="nav-item">
          <a class="nav-item nav-link text-light" href="Dashboard.php">Dashboard</a>
        </li>
      		<li class="nav-item">
        		<a class="nav-item nav-link text-light" href="Reservation.php">Reservation</a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-item nav-link text-light" href="ViewCustomer.php">Customer</a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-item nav-link text-light" href="Schedule.php">Schedule</a>
      		</li>
    	</ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-item nav-link text-light" href="adminSign.php"><i class="fa fa-sign-in" aria-hidden="true"></i>  Logout</a>
        </li>
      </ul>
    </div>
</nav>
<br>

<div class="container">	
	<div class="row">
        <div class="col-md-8">
    <?php  
    if (isset($_GET['deleted'])) 
    {
       $msg = $_GET['deleted'];    
        if ($msg=='success') 
        {
           echo "<br><div  role='alert' w-100>
           <h5>Successcully Deleted</h5>
          </div>";
        } 
     }
    if (isset($_GET['done'])) 
    {
       $msg1 = $_GET['done'];    
        if ($msg1=='update') 
        {
           echo "<br><div class='alert alert-success' role='alert' w-100>
           <h5>Successcully Updated</h5>
          </div>";
        } 
     }
     ?>
      <h2>Bus Details <i class=" fa fa-info-circle" aria-hidden="true"></i></h2>
          </div>
          <a href="Admin_AddBus.php" class="add"><h3 class="text-light"><br><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Bus</h3></a>
<!--           <div class="col-md-4 ml-auto">
            <div class="search-box">
              	<div class="input-group">
    			     	<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
    			   	</div>
    				<input class="form-control" type="text" placeholder="Search...">
  				</div>
        </div> -->
  		</div>
   </div>

 <?php 
$sql = "SELECT * FROM `vehicle` ORDER BY `NUMBER` ASC";
$result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    echo "<table class='table table-bordered table-dark text-center'>
        <thead class='bg-success'>
          <tr>
            <th>Bus Number</th>
            <th>Model</th>
            <th>Total seats</th>
            <th>Action</th>
          </tr>
        </thead>";
    while ($row = $result->fetch_assoc()) 
    { 
          echo "<tr>
            <td>".$row["NUMBER"]."</td>
            <td>".$row["MODEL"]."</td>
            <td>".$row["TOTAL_SEATS"]."</td>"; ?>
            <td>
              <a href="DeleteBus.php?number=<?php echo $row["NUMBER"];?>" class="delete" name="Delete" data-toggle="tooltip"><i class=" fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
              <a href="UpdateBus.php?number=<?php echo $row["NUMBER"];?>"><i class=" fa fa-edit" aria-hidden="true"></i></a>
              </td>
          <?php
          "</tr>";
    }
  }
?>

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