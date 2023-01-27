<!DOCTYPE html>
<?php
include 'dbConn.php';
?>
<html>
<head>
      <title>
            Alpha Express - Update Bus
      </title>
          <link rel="stylesheet" href="css/bootstrap.min.css"/>
          <link rel="stylesheet" href="css/custom.css"/>
          <link rel="stylesheet" href="css/style1.css"/>
          <script src="js/bootstrap.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300&display=swap" rel="stylesheet">
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300&display=swap" rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<link rel="shortcut icon" type="image/png" href="res/logo1.png">
<body onload="myword()">
  <div id="loader"></div>

  <nav class="navbar navbar-expand-lg  bg-success">
   <a class="navbar-brand text-light" href="index.php"><img class="logo" src="res/logo.png"></a>
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
    </li>
      <li class="nav-item">
        <a class="nav-item nav-link text-light" href="adminSign.php"><i class="fa fa-sign-in" aria-hidden="true"></i>  Logout</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<!--       <------Navbar ends---->      
<img class="hero" src="res/5.png">
  <div class="container">
  <div class="row">
    <div class="col-md-4">

      <?php  
      if (isset($_GET['error'])) 
      {
         $msg = $_GET['error'];    
          if ($msg='empty') 
          {
             echo "<br><div class='alert alert-danger' role='alert' w-100>
             <h5>All the Fields are required</h5>
            </div>";
          } 
       }
      elseif (isset($_GET['done'])) 
      {
         $msg = $_GET['done'];    
          if ($msg='success') 
          {
             echo "<br><div class='alert alert-success' role='alert' w-100>
             <h5>Successfull Updated Bus</h5>
            </div>";
          } 
       }
       ?>

      <h1>Update Bus <i class="fa fa-bus" aria-hidden="true"></i></h1>
      <div class="form-group">
    <form method="GET" action="ValidateUpdateBus.php">
      
      
      <label>Number:</label>
      <input type="Number" class="form-control" name="bn1" disabled="disabled" placeholder="Bus Number*"  value=<?php 
       if (isset($_GET['number'])) {
          echo $_GET['number'];
       }          
       ?>  ><br>

       <input type="hidden" class="form-control" name="bn"  placeholder="Bus Number*"  value=<?php 
       if (isset($_GET['number'])) {
          echo $_GET['number'];
       }          
       ?>  >
      
      <label>Model:</label>
      <input type="Number" class="form-control" name="bm" placeholder="Bus Model*"  value=<?php 
       if (isset($_GET['bm1'])) {
          echo $_GET['bm1'];
       }
       ?> ><br>
      
      <label>Total Seats:</label>
      <input type="Number" class="form-control" name="ts"  placeholder="No Of Seats*"  value=<?php 
       if (isset($_GET['ts1'])) {
          echo $_GET['ts1'];
       }
       ?> ><br>
      
      <button class="btn btn-primary w-100" name="submit" >UPDATE</button>
      </div>
      </form>

    </div>
  </div>
</div>
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