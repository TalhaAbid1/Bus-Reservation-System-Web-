<!DOCTYPE html>
<?php  
include 'dbConn.php';
?>
<html>
<head>
  <title>Alpha Express - Schedule</title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
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
            <a class="nav-item nav-link text-light" href="Admin_BusDetails.php">Bus Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link text-light" href="ViewCustomer.php">Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link text-light" href="Reservation.php">Reservation</a>
          </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-item nav-link text-light" href="adminSign.php"><i class="fa fa-sign-in" aria-hidden="true"></i>  Logout</a>
        </li>
      </ul>
    </div>
</nav><br>

<div class="col-md-5">
  <h1> SCHEDULE <i class=" fa fa-calendar" aria-hidden="true"></i></h1>
  <a href="Admin_AddBus.php" class="add"><h3 class="text-light"><br><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Bus</h3></a>
</div>
<?php 
$sql = "SELECT * FROM `schedule`";
$result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    echo "<table class='table table-bordered table-dark text-center'>
        <thead class='bg-success'>
          <tr>
            <th>Schedule ID</th>
            <th>Class</th>
            <th>Departure Time</th>
            <th>Departure date</th>
            <th>Price</th>
            <th>Departure</th>
            <th>Departure</th>
            <th>Bus No.</th>
            <th>Actions</th>
          </tr>
        </thead>";
    while ($row = $result->fetch_assoc()) 
    { 
          echo "<tr>
            <td>".$row["s_id"]."</td>
            <td>".$row["Class"]."</td>
            <td>".$row["Departure_time"]."</td>
            <td>".$row["Departure_date"]."</td>
            <td>".$row["Price"]."</td>
            <td>".$row["Leaving_from"]."</td>
            <td>".$row["going_to"]."</td>
            <td>".$row["bus_no"]."</td>";?>
            <td>
              <a href="DeleteSchedule.php?sid=<?php echo $row["s_id"];?>" class="delete" name="Delete" data-toggle="tooltip"><i class=" fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
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