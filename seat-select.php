<!DOCTYPE html>
<?php
  session_start();
  include 'dbConn.php';
?>
<html>
<head>
  <title>
    Alpha Express - Seat Selection
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/Seatstyle.css">
  <!-- <script src="js/javaS.js"></script> -->
  <link rel="shortcut icon" type="image/png" href="res/logo1.png">

</head>
<body onload="foo() , myword()" class="text-light">
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
  </nav><br><br>


<div class="container">
<div class="row">
  <div class="col-md-6">
    <h1>Select your Seat</h1>
    <div class="red">Reserved</div>
    <div class="green">Available</div>
    <div class="blue">Select</div>
</div>
  <div class="col-md-6">
    <h1>
      Your Selected Seat :
    </h1>
    <h5 id="bla">Seat number will appear below after selecting<h5/>
      </div>
  

</div>
<div class="parent">
  <div class="child1 border">
    <div  id="bus">
    </div>
  </div>
  <div class="child2 ml-3">
    <h1 id="sseat"></h1>
    <h2 id="price"></h2>
    <h4 id="error" style="color:red;"></h4>
    <button id="next" class="btn btn-info hidden" >Next</button>
  </div>
</div>
</div>
<?php 
  $yeslogin = 0;

  if (isset($_SESSION["firstname"])) {
     $yeslogin = 1;
  }

 ?>


<?php 

  if (isset($_GET['id'])) {
     $id = $_GET['id'];
  

  $sql = "SELECT * FROM  schedule s INNER JOIN vehicle v ON s.bus_no=v.NUMBER WHERE s_id = '$id'";

  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
     $price = $row['Price'];
     $seats = $row['TOTAL_SEATS'];
  }

    $sql1 = "SELECT * FROM reservation WHERE res_schedule = '$id'";
    $resut1 = $conn->query($sql1);
    $resarray = array();
    while ($row1 = $resut1->fetch_assoc()) {
         array_push($resarray,$row1['seat_no']);
  }

}
?>

<!-- FOOTER -->
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
function foo() {

var seats=new Array(<?php echo $seats; ?>);//Get total seats from database
var price = <?php echo $price;?>;//This will come from database
var reservedSeats = <?php echo json_encode($resarray); ?>;; //get reserved seats if any
var resvalues = Array.from(reservedSeats);


if(reservedSeats.length > 0){
        for(var loop =0;loop<reservedSeats.length;loop++){
            reservedSeats[loop] = document.createElement('DIV');
            reservedSeats[loop].innerHTML = resvalues[loop];
            
        }
}

// alert(reservedSeats[0].innerHTML);

var i=seats.length;
for(i;i>0;i--)
{
  seats[i]=document.createElement('DIV');
  seats[i].innerHTML = i;
  seats[i].setAttribute("id", i);
  seats[i].setAttribute("class", "numbers inline");
  document.getElementById('bus').prepend(seats[i]);
  
  if(reservedSeats.length>0){
   for(var j =0;j<reservedSeats.length;j++){
    
    if(seats[i].innerHTML === reservedSeats[j].innerHTML){
          seats[i].style.backgroundColor = "red";
          seats[i].style.pointerEvents = "none";   
      }
      }//for 
    
    
  }
 

}


var selecteditems = new Array();
document.getElementById('bus').addEventListener('click',function(e){
   if(e.target !== e.currentTarget){
   
     var clickeditem = e.target.id;
     
     
       
     if(!selecteditems.includes(clickeditem)){
       if(selecteditems.length<6){
         selecteditems.push(clickeditem);
         document.getElementById('sseat').innerText ="Seat No: "+ selecteditems;
       document.getElementById(clickeditem).style.backgroundColor = "blue";
             document.getElementById('error').innerText= "";
       }
       else{
      document.getElementById('error').innerText= "You cannot reserve more than 6 seats";  
       }
         
       }
     
     else if(selecteditems.includes(clickeditem)){
        const index = selecteditems.indexOf(clickeditem);
        if (index > -1) {
            selecteditems.splice(index, 1);
        } 

       document.getElementById('sseat').innerText ="Seat No: " + selecteditems;
       document.getElementById(clickeditem).style.backgroundColor = "green";
       document.getElementById('error').innerText= "";
     }
 
 if(selecteditems.length === 0){   document.getElementById('price').innerText = "";    
 }
else{     document.getElementById('price').innerText = "Total Seats:"+selecteditems.length+"\nTotal Price = "+selecteditems.length*price+"Rs";
    }
 
     if(selecteditems.length <= 0){
       document.getElementById('next').style.visibility = "hidden";
     }
     else if(selecteditems.length > 0){
       document.getElementById('next').style.visibility = "visible";
     }
     
//      for(var i=30;i>0;i--)
// {

//   // if(seats[i].innerText !== clickeditem){
//   //      seats[i].style.backgroundColor = "blue";   
//   // }

// }



               
}

document.getElementById('next').addEventListener('click', function() {
     <?php $_SESSION["seatSelect"] = true; ?> 
     var seatjs = new Array();
     var seatjs = selecteditems;

     let n = <?php echo $yeslogin; ?>;
     if (n === 1 ) { 
      window.sessionStorage.setItem("seatjs",JSON.stringify(seatjs));
      var totalprice = (price*seatjs.length);
      window.sessionStorage.setItem("price",totalprice);
      <?php $_SESSION["schedule"] = $id; ?>
      location.href = "confirmBooking.php";
      
     }
     else{
      window.sessionStorage.setItem("seatjs",JSON.stringify(seatjs));
      var totalprice = (price*seatjs.length);
      window.sessionStorage.setItem("price",totalprice);
      <?php $_SESSION["schedule"] = $id; ?>
        
        location.href = "Login.php";


     }

  });





  e.stopPropagation();
  
});

}

 



</script>
</body>
</html>