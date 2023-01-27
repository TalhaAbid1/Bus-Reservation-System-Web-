<!DOCTYPE html>
<?php
session_start();
  include 'dbConn.php';
?>
<html>
<head>
	<title>
		Alpha Express - Home page
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
                echo "<a class='nav-item nav-link text-light' href='sign-up.php'><i class='fa fa-user' aria-hidden='true'></i> Sign Up</a></li>
        <li class='nav-item'>
          <a class='nav-item nav-link text-light' href='login.php'><i class='fa fa-sign-in' aria-hidden='true'></i>  Login</a>
        </li> ";
              }


          ?>

        
      </ul>
    </div>

  </nav>
  <img class="hero" src="res/5.png">
  <div class="row">
   <div class="col-md text-light">
    <marquee class="mr" >Important Notice: Due to Covid 19 Please follow the SOPs <img class="fm" src="res/fm.png"> and BE ON TIME !...</marquee>
  </div>
</div>
<br><br><br>
<div class="container">
  <div class="row">
  	<div class="col-md h3b">
      <h3><u>Select the Schedule</u></h3>  
      <br>   		 
    </div>
  </div>

  <div class="row">

    <div class="col-md-4">

     <form role="form" method="GET" action="schedule.php">
       <div class="form-group">
        <?php 
        if (isset($_GET['dcerror'])) {
             $dcerror = $_GET['dcerror'];
           if ($dcerror)
            {
                echo "<h5>Please Enter Required Fiels To Proceed Further &#10071</h5>";
            }
         }         
        ?>

        <select name="leavingfrom" class="form-control">
         <option name="" >Select Departure City</option>
          <?php  
                $sql =  "SELECT DISTINCT `Leaving_from` FROM `schedule` ORDER BY Leaving_from";
                $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  {
                    while($row = $result->fetch_assoc()) 
                    {?>
                       <option value=<?php echo $row["Leaving_from"] ?> > <?php echo $row["Leaving_from"] ?></option><br>";

                     <?php
                    }
                  } 
                  else 
                  {
                    echo "<option> Sorry No Schedule Available Now...!</option>";
                  }
          ?>

       </select>
       &nbsp;
       <select name="goingto" class="form-control">
         <option>Select Arrival City</option>
            <?php  
                $sql =  "SELECT DISTINCT `going_to` FROM `schedule` ORDER BY going_to";
                $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  {
                    while($row = $result->fetch_assoc()) 
                    {?>
                       <option value=<?php echo $row["going_to"] ?> > <?php echo $row["going_to"] ?></option>";

                     <?php
                    }
                  } 
                  else 
                  {
                    echo "<option> Sorry No Schedule Available Now...!</option>";
                  }
          ?>
       </select>
       &nbsp;
       <input class="form-control" onFocus="(this.type='date')"  placeholder="Select Reservation Date" type="text" name="date" >
       &nbsp;
       <input class="form-control btn bg-primary text-light"  type="submit" name="submit" >

     </div>
   </form>
 </div>
</div>

<br><br><br><br><br><br><br>
<br><br><br>
<div class="row">
 <div class="col-md-4">

   <h3> <i class="fa fa-usd" aria-hidden="true"></i>  Lowest fares
   </h3>
   <p>Guaranteed Lowest Fares wih saving upto 40%

   </p>  	  	
 </div>
 <div class="col-md-4">
   <h3><i class="fa fa-tags" aria-hidden="true"></i>  Best Discounts
   </h3>
   <p>Get the best discounts on all categories across Pakistan</p>

 </div>
 <div class="col-md-4">

   <h3><i class="fa fa-globe" aria-hidden="true"></i>  Discover
   </h3>
   <p>Discover the best places to visit in Pakistan</p>
 </div>
</div>
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
  $('select').change(function() {
    $(this)
        .siblings('select')
        .children('option[value=' + this.value + ']')
        .attr('hidden', true)
        .siblings().removeAttr('hidden');    
});
</script>

</body>
</html>