<?php
include 'dbConn.php';

if (isset($_GET['number'])) {
	
	 $number =  $_GET['number'];
//	 echo $number;

	 $sql ="DELETE FROM `vehicle` WHERE `NUMBER` = '$number'";

	 if ($conn->query($sql) == true) {
	 	header('location:Admin_BusDetails.php?deleted=success');
	 }
}   

?>