<!DOCTYPE html>
<?php
include 'dbConn.php';
?>
<html>
<head>
  <title>
    Alpha Express - Admin-LogIn
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
<nav class="navbar navbar-expand-lg  bg-success">
    <a class="navbar-brand text-light" href="#"><img class="logo" src="res/logo.png"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
    <span class="navbar-toggler-icon"></span>
  </button>

</nav>
<div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="res/face.png">
        </div>
        <h3>Admin Login</h3><br>
        <div class="col-12 form-input">
          <form method="POST" action="adminvalidate.php">

                  <?php  
      if (isset($_GET['error'])) 
      {
         $msg = $_GET['error'];    
          if ($msg='empty') 
          {
             echo "<div role='alert' w-100>
             <h4><i class='fa fa-asterisk' aria-hidden='true'></i> All the Fields are required</h4>
            </div>";
          } 
       }
      elseif (isset($_GET['fake'])) 
      {
         $msg = $_GET['fake'];    
          if ($msg='invalidate') 
          {
             echo "<div role='alert' w-100>
             <h4><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Invalidate Credentials</h4>
            </div>";
          } 
       }
       ?>

            <div class="form-group">
                <input type="text" class="form-control" name="uname" placeholder="Enter Username" value=<?php 
                 if (isset($_GET['uname1'])) {
                    echo $_GET['uname1'];
                 }
                 ?>>
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="pass" placeholder="Enter Password" value=<?php 
                 if (isset($_GET['pass1'])) {
                    echo $_GET['pass1'];
                 }
                 ?>><br>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Login</button>
          </form>
        </div>      
      </div>
    </div>
  </div>
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