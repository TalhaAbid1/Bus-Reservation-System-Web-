<!DOCTYPE html>
<?php
include 'dbConn.php';
?>
<html>
<head>
      <title>
            Alpha Express - Add Schedule
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
             <h5>Successfull Added New Schedule</h5>
            </div>";
          } 
       }
       ?>

      <h1>Add New Schedule <i class="fa fa-bus" aria-hidden="true"></i></h1>
      <div class="form-group">
    <form method="GET" action="vildateSch.php">
      
      
      <label>S_ID:</label>
      <input type="text" class="form-control" name="sid" placeholder="Enter Schedule id*"  value=<?php 
       if (isset($_GET['sid1'])) {
          echo $_GET['sid1'];
       }          
       ?> ><br>
      
      <label>Class:</label>
      <input type="text" class="form-control" name="class" placeholder="Business/Economy*"  value=<?php 
       if (isset($_GET['class1'])) {
          echo $_GET['class1'];
       }
       ?> ><br>
      
      <label>Departure time:</label>
      <input type="text" class="form-control" name="dt"  placeholder="08:00 AM*"  value=<?php 
       if (isset($_GET['dt1'])) {
          echo $_GET['dt1'];
       }
       ?> ><br>
       <label>Departure date:</label>
      <input type="date" class="form-control" name="dd"  placeholder="Date*"  value=<?php 
       if (isset($_GET['dd1'])) {
          echo $_GET['dd1'];
       }
       ?> ><br>

       <label>Price:</label>
      <input type="text" class="form-control" name="p"  placeholder="200/300etc*"  value=<?php 
       if (isset($_GET['p1'])) {
          echo $_GET['p1'];
       }
       ?> ><br>
       <label>Departure Place:</label>
      <input type="text" class="form-control" name="dp"  placeholder="LAHORE/GUJRANWALA etc*"  value=<?php 
       if (isset($_GET['dp1'])) {
          echo $_GET['dp1'];
       }
       ?> ><br>
       <label>Arrival Place
       :</label>
      <input type="text" class="form-control" name="ap"  placeholder="LAHORE/GUJRANWALA etc*"  value=<?php 
       if (isset($_GET['ap1'])) {
          echo $_GET['ap1'];
       }
       ?> ><br>

       <label>Bus
       :</label>
       <select name="bus" class="form-control">
         <option name="" >Select Bus</option>
          <?php  
                $sql =  "SELECT `NUMBER` FROM `vehicle`";
                $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  {
                    while($row = $result->fetch_assoc()) 
                    {?>
                       <option value=<?php echo $row["NUMBER"] ?> > <?php echo $row["NUMBER"] ?></option><br>";

                     <?php
                    }
                  } 
  
          ?>

       </select>
        
        <br>
       

      
      <button type="submit " class="btn btn-primary w-100" name="submit" >ADD</button>
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