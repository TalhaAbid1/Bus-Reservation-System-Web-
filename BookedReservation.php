<!DOCTYPE html>
<?php
session_start();
  include 'dbConn.php';

?>
<html>
<head>
	<title>
		Alpha Express - Booked Reservation
	</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
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
        <li class="nav-item active">
          <a class="nav-item nav-link text-light" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link text-light" href="Contact.html">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link text-light" href="About.html">About Us</a>
        </li>
        <?php 
         if (isset($_SESSION["firstname"])) {
           echo "<a class='nav-item nav-link text-light' href='BookedReservation.php'>Your Reservations</a></li>";
           echo "<a class='nav-item nav-link text-light' href='profile.php'>Your Profile</a></li>";
           echo "<a class='nav-item nav-link text-light' href='signout.php'>Sign out</a></li>";
         }

       ?>
      </ul>

      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
         <?php 
              if (isset($_SESSION["firstname"])) {
                  ?> <a class="nav-item nav-link text-light"><i class="fa fa-user" aria-hidden="true"></i>Hello,<?php echo $_SESSION["firstname"]; ?> </a></li>
                  <?php 
              }
              else{
               
              }


          ?>

        
      </ul>
    </div>

  </nav>
  <!-- <img class="hero" src="res/5.png"> -->
<br>
<div class="container">
  <div class="row">
   <div class="col-md-4 offset-md-4">
    <?php 
         if (isset($_GET['res'])) {
             if ($_GET['res'] == 'success') {
               echo "<div class='alert alert-success'>Reservation Booked Sucessfully</div>";
             }
         }
     ?>
     <?php 
         if (isset($_GET['delt'])) {
             if ($_GET['delt'] == 'yes') {
               echo "<div class='alert alert-danger'>Record Deleted</div>";
             }
         }
     ?>
      
   </div>
 </div>

<div class="row">
  <h1>Your Booked Reservations</h1>
</div>
 <div class="row">
  <div class="col-md">
<table  style="cursor: default;" class="table table-bordered text-center">
  
  
  
  

<?php 
   $user = $_SESSION['username'];
   $sql = "SELECT * FROM `reservation` r JOIN schedule s ON (r.res_schedule = s.s_id) WHERE r.reserved_by = '$user' GROUP BY r.res_id";
   $result = $conn->query($sql);
  if ($result->num_rows > 0) {
     ?>
     <tr>
  <th>Reservation Id</th>
  <th>Departure</th>
  <th>Arrival</th>
  <th>Seat no</th>
  <th>Total seats</th>
  <th>Total Price</th>
  <th>Dept time</th>
  <th>Dept date</th>
  <th>Reservation Date</th>
  <th>Action</th>
  </tr>
  <tr>
    <?php 

   // print_r($result);
       $reservations = array();
   
       for ($i=0; $i < $result->num_rows ; $i++) { 
            $row = $result->fetch_assoc();
            echo "<tr>";
            $reservations[$i] = $row['res_id'];
            echo "<td>$reservations[$i]</td>";
            $sql1 = "SELECT * FROM `reservation` WHERE reserved_by = '$user' AND res_id = '$reservations[$i]'";
            echo "<td>".$row['Leaving_from']."</td>";
            echo "<td>".$row['going_to']."</td>";
            $result1 = $conn->query($sql1);
            $seatnums = array();
            while ($row1 = $result1->fetch_assoc()) {
               array_push($seatnums, $row1['seat_no']);
            } 
      

              echo "<td>".implode(", ", $seatnums)."</td>";

              echo "<td>".$result1->num_rows."</td>";
              echo "<td>".$row['Price']*$result1->num_rows."</td>";
              echo "<td>".$row['Departure_time']."</td>";
              echo "<td>".$row['Departure_date']."</td>";
              echo "<td>".$row['res_date']."</td>";
              echo "<td><a class='btn btn-info' href='DeleteReservation.php?resid=$reservations[$i]'>Cancel</a></td>";
              echo "</tr>";
        }


  }
  else{
      echo "<h1>You do not have any reservation</h1>";
  }

   

 ?>
</table>
</div>
</div>
</div>  
<br>
<br>

<footer class="bg-success">
	<h5>All Rights Reserved 2021 &copy;</h5>
</footer>

<script type="text/javascript">
  
  
</script>


<script> 
  var preload = document.getElementById("loader");
  function myword()
  { 
    
    preload.style.display='none';
  }
 
</script>

</body>
</html>