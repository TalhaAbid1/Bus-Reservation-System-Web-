<!DOCTYPE html>
<?php
session_start();
  include 'dbConn.php';

?>
<html>
<head>
	<title>
		Alpha Express - Profile
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
  <img class="hero" src="res/5.png">
<br>
<div class="container">
  <h1>Your Personal Details</h1>
  <div class="row">
    <div class="col-md-4">
  <table class="table table-bordered text-center">
    <?php 
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM  customer WHERE USERNAME like '$user' ";
    $result = $conn->query($sql);
    while ( $row = $result->fetch_assoc()) {
     
     ?>
    <tr>
      <th>Name:</th>
      <td><?php echo $row['FIRST_NAME']." ".$row['LAST_NAME']; ?></td>
    </tr>
    <th>Username:</th>
      <td><?php echo $row['USERNAME']; ?></td>
    </tr>
    <th>Email</th>
      <td><?php echo $row['EMAIL']; ?></td>
    </tr>
    <th>Phone:</th>
      <td><?php echo $row['PHONE']; ?></td>
    </tr>
    <th>ID Card:</th>
      <td><?php echo $row['ID_CARD']; ?></td>
    </tr>
    <?php } ?>
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