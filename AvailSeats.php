<?php 
  function availseat($id){
  include 'dbConn.php'; 
  $sql3 = "SELECT * FROM reservation WHERE res_schedule = '$id'";
  $result3 = $conn->query($sql3);

  $seats = $result3->num_rows; 

   return  (int)$seats;

}



 // availseat();