<?php 
include 'dbConn.php';
session_start();
$sid = $_SESSION["schedule"];
$user = $_SESSION['username'];
 
 if (isset($_GET['seats'])) {

   $seatno = explode(",",$_GET['seats']);

}
 	 $today = date("20y-m-d"); 
 	 $sql = "SELECT MAX(res_id)+1 FROM `reservation` ";
	 $result = $conn->query($sql);
	 $row = $result->fetch_assoc();
	 $resid = $row['MAX(res_id)+1'];
     $res = true;
 for ($i=0; $i < count($seatno); $i++) { 

		$sql1 ="INSERT INTO reservation(res_id,res_date,res_schedule, seat_no,reserved_by) VALUES ('$resid','$today','$sid','$seatno[$i]','$user')";	
		if ($conn->query($sql1) == true) {
			echo "Data inserted successfully";
		}
		else{
			echo "Data not inserted ".$conn->error;
			$res = false;
		}

	}

if ($res == true) {
	header('location: BookedReservation.php?res=success');
}
else{
   	header('location: confirmBooking.php?res=fail');
}