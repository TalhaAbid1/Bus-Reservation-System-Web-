<!DOCTYPE html>
<?php
  session_start();
  include 'dbConn.php';
  include 'AvailSeats.php';
?>
<html>
<head>
	<title>
		Alpha Express - Schedule
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
                  ?> <a class="nav-item nav-link text-light"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Hello,<?php echo $_SESSION["firstname"]; ?> </a></li>
                  <?php 
              }

          ?>
      </ul>
    </div>
  </nav>
  <!-- <img class="hero" src="res/5.png"> -->
  <div class="row">
   <div class="col-md text-light">
    <marquee class="mr" >Important Notice: Due to Covid 19 Please follow the SOPs <img class="fm" src="res/fm.png"> and BE ON TIME !...</marquee>
  </div>
</div>

<div class="container">
      
      <?php 
        $leavingFrom = $_GET['leavingfrom'];
        $goingTo = $_GET['goingto'];
        $date = $_GET['date'];
        
        if ($leavingFrom == "Select Departure City" || $goingTo == "Select Arrival City" || $date == "" ) 
        {
          header('location:index.php?dcerror=true');
        }
        
        // echo $leavingFrom . "<br>" . $goingTo . "<br>" . $date . "<br>";
      ?>

      <div class="row">
        <div class="col-md-4 offset-md-2"><h1>SCHEDULE</h1></div>
      </div>

      <div class="row">

        <div class="col-md-12">
          <?php 
              $today = date("20y-m-d");
             $sql = "SELECT * FROM  schedule s INNER JOIN vehicle v ON s.bus_no=v.NUMBER WHERE s.Leaving_from = '$leavingFrom'  AND s.going_to = '$goingTo' AND s.Departure_date = '$date' AND s.Departure_date >= '$today'";
          
             


             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
                   
                   while ($row = $result->fetch_assoc()) {
                  ?>                  
                   <div class="row  p-2 mb-3 ">            
                   <div class="col-md-2  mx-auto"></div>
                   <div class="col-md-6 pl-3 p-2 bg bg-dark"><h2><?php echo $row['Leaving_from']." <-> ".$row['going_to']." " ?><i class="fa fa-bus" aria-hidden="true"></i>
                    </h2>
                     <?php echo "Class:".$row['Class']." <br>Time: ".$row['Departure_time']." <br>Dept Date: ".$row['Departure_date']." <br>Price: ".$row['Price']." <br>Available Seats : ".($row['TOTAL_SEATS'] - availseat($row['s_id'])); 


                       ?>
                  </div>
                   
                   <div class="col-md-2"></h3><a href="seat-select.php?id=<?php echo $row['s_id']; ?>"><button class='btn btn-info w-100 h-100'>Book Now<i class="fa fa-plane" aria-hidden="true"></i></button></a></div>
                   <div class="col-md-2"></div>
                </div>
                
            <?php 
              }
            }
            else{

                 echo " <div class='row'>
                     <div class='col-md-6 offset-md-2'><h1><br>Opps! &#128533;<br>No Schedule available on that day.</h1></div>
                  </div>";
                  ?>
<br>
<div class="row">
        <div class="col-md-4 offset-md-2"><h1>Relevant SCHEDULE</h1></div>
      </div>

      <div class="row">

        <div class="col-md-12">
          <?php 
              $today = date("20y-m-d");
             
          
             $sql1 = "SELECT * FROM  schedule s INNER JOIN vehicle v ON s.bus_no=v.NUMBER WHERE s.Leaving_from = '$leavingFrom'  AND s.going_to = '$goingTo' AND s.Departure_date >= '$today'";


             $result1 = $conn->query($sql1);

             if ($result1->num_rows > 0) {
                   
                   while ($row1 = $result1->fetch_assoc()) {
                  ?>                  
                   <div class="row  p-2 mb-3 ">            
                   <div class="col-md-2  mx-auto"></div>
                   <div class="col-md-6 pl-3 p-2 bg bg-dark"><h2><?php echo $row1['Leaving_from']." <-> ".$row1['going_to']." " ?><i class="fa fa-bus" aria-hidden="true"></i>
                    </h2>
                     <?php echo "Class:".$row1['Class']." <br>Time: ".$row1['Departure_time']." <br>Time: ".$row1['Departure_date']." <br>Price: ".$row1['Price']." <br>Available Seats : ".($row1['TOTAL_SEATS'] - availseat($row1['s_id'])); 


                       ?>
                  </div>
                   
                   <div class="col-md-2"></h3><a href="seat-select.php?id=<?php echo $row1['s_id']; ?>"><button class='btn btn-info w-100 h-100'>Book Now<i class="fa fa-plane" aria-hidden="true"></i></button></a></div>
                   <div class="col-md-2"></div>
                </div>
                
            <?php 
              }
            }
  
             ?>
        </div>
      </div>
      <?php 

            }
             ?>
        </div>
      </div>



</div>
<br><br><br>
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