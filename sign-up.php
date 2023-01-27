<!DOCTYPE html>
<?php include 'dbconn.php'; ?>
<html>
<head>
      <title>
            Alpha Express
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
        <a class="nav-item nav-link text-light" href="Contact.html">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link text-light" href="About.html">About Us</a>
      </li>
    </ul>

    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link text-light" href="Login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>  Login</a>
      </li>
    </ul>
  </div>
</nav>
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
             <h4>All the Fields are required</h4>
            </div>";
          } 
       }
 
      elseif (isset($_GET['passerror'])) 
      {
         $msg = $_GET['passerror'];    
          if ($msg='mismatch') 
          {
             echo "<br><div class='alert alert-info' role='alert' w-100>
             <h5>password Mismatch</h5>
            </div>";
          } 
       }
       ?>

    <form class="bg" method="POST" action="validate-sign-up.php">
      <h1>Register Yourself</h1>
      <div class="form-group">
      
      
      <label>First Name:</label>
      <input type="text" class="form-control" name="fn" placeholder="First Name*"  value=<?php 
       if (isset($_GET['fn1'])) {
          echo $_GET['fn1'];
       }          
       ?> ><br>
      
      <label>Last Name:</label>
      <input type="text" class="form-control" name="ln" placeholder="Last Name*"  value=<?php 
       if (isset($_GET['ln1'])) {
          echo $_GET['ln1'];
       }
       ?> ><br>
      
      <label>User Name:</label>
      <input type="text" class="form-control" name="un"  placeholder="E.g. name123"  value=<?php 
       if (isset($_GET['un1'])) {
          echo $_GET['un1'];
       }
       ?> ><br>
      
      <label>Email:</label>
      <input type="email" class="form-control" name="mail" placeholder="abc@example.com"  value=<?php 
       if (isset($_GET['mail1'])) {
          echo $_GET['mail1'];
       }
       ?> ><br>

      <label>Phone Number:</label>
      <input type="integer" class="form-control" name="phone" placeholder="Enter your Phone Number"  minlength="11" maxlength="11" value=<?php
        if (isset($_GET['phone1'])) {
          echo $_GET['phone1'];
       }
       ?>><br> 
      
      <label>ID Card:</label>
      <input type="integer" minlength="13" maxlength="13" class="form-control" name="idcard" placeholder="Enter your ID Card Number"  value=<?php
        if (isset($_GET['id1'])) {
          echo $_GET['id1'];
       }
       ?>><br> 
      

      <label>Password:</label>
      <input type="password" class="form-control" name="pass" placeholder="Enter 6 Digits Password" minlength="6"><br>
     
      <label>Confirm Password:</label>
      <input type="password" class="form-control" name="cpass" placeholder="Enter 6 Digits Password again" minlength="6"><br>
     
      <button class="btn btn-primary w-100" name="submit" >Register</button>
      </div>
      </form>
  </div>
  </div>
</div>
<br><br>
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