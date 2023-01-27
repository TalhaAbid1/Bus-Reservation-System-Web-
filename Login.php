<!DOCTYPE html>
<?php
include 'dbconn.php';
?>
<html>
<head>
	<title>
		Alpha Express-Login
	</title>
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

<body>
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
        <a class="nav-item nav-link text-light" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link text-light" href="#">About Us</a>
      </li>
    </ul>

    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-item nav-link text-light" href="sign-up.php"><i class="fa fa-user" aria-hidden="true"></i> Sign Up</a>
      </li>
      <li class="nav-item">
      </li>
    </ul>
  </div>
	</nav>
      
<div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="res/face.png">
        </div>

        <div class="col-12 form-input">
          <form method="POST" action="validate-Login.php">            
                    <?php  
              if (isset($_GET['error'])) 
              {
                 $msg = $_GET['error'];    
                  if ($msg='empty')
                  {
                     echo "<div role='alert'>
                     <h5><i class='fa fa-asterisk' aria-hidden='true'></i> All the Fields are required</h5>
                    </div>";
                  } 
              }
              elseif (isset($_GET['wrong'])) 
              {
                 $msg = $_GET['wrong'];    
                  if ($msg = 'true') 
                  {
                     echo "<div class='' role='alert' w-100>
                     <h5><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Invalid Credentials</h5>
                    </div>";
                  } 
               }
              elseif (isset($_GET['signup'])) 
              {
                 $msg = $_GET['signup'];    
                  if ($msg == 'success') 
                  {
                     echo "<div class='alert alert-success' role='alert' w-100>
                     <h5><i class='fa fa-check' aria-hidden='true'></i> Registered Sucessfully</h5>
                    </div>";
                  } 
               }
               ?>
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Enter User Name" value=<?php 
                 if (isset($_GET['user1'])) 
                 {
                    echo $_GET['user1'];
                 }
                 ?> >
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="pass" placeholder="Enter Password" value=<?php 
                 if (isset($_POST['pass1'])) 
                 {
                    echo $_POST['pass1'];
                 }
                 ?> >
            </div>
            <button type="submit" name="submit" class="btn btn-success" >Login</button>
          </form>
        </div>

        <div class="col-12 forgot">
          <a href="sign-up.php">Create Account</a>
        </div>
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
</script>

</body>
</html>