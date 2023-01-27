<?php
include 'dbConn.php';

if (isset($_GET['sid'])) {
	
	 $sid =  $_GET['sid'];
//	 echo $sch_id;

	 $sql ="DELETE FROM `schedule` WHERE `s_id` = '$sid'";

	 if ($conn->query($sql) == true) 
	 {
	 	header('location:Schedule.php?deleted=success');
	 }
	 else{
	 	echo "Not Deleted".$conn->error;
	 }
}   

?>