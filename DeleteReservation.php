<?php
include 'dbConn.php'; 
if (isset($_GET['resid'])) {
	 $resid=$_GET['resid'];
	 $sql = "DELETE FROM `reservation` WHERE res_id = '$resid'";
	 $conn->query($sql);
	 header('location: BookedReservation.php?delt=yes');
}