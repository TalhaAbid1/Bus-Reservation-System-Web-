<?php  
include 'dbConn.php';
if (!isset($_GET['submit'])) 
 {
 	echo "Not Working";

 }
 else{

   $sid = $_GET['sid'];
   $class = $_GET['class'];
   $depttime = $_GET['dt'];
   $deptdate = $_GET['dd'];
   $price = $_GET['p'];
   $deptplace = $_GET['dp'];
   $arrivalplace = $_GET['ap'];
   $bus = $_GET['bus'];

   if (empty($sid) || empty($class) || empty($depttime) || empty($deptdate) || empty($price) || empty($deptplace) || empty($arrivalplace) || empty($bus)) 
{
	header('location:Admin_AddSch.php?error=empty&&sid1='.$sid.'&&class1='.$class.'&&dt1='.$depttime.'&&dd1='.$deptdate.'&&p1='.$price.'&&dp1='.$deptplace.'&&ap1='.$arrivalplace.'');
}
else{

	$sql ="INSERT INTO schedule (`s_id`, `Class`, `Departure_time`, `Departure_date`, `Price`, `Leaving_from`, `going_to`, `bus_no`) VALUES ('$sid','$class','$depttime','$deptdate','$price','$deptplace','$arrivalplace','$bus')";
	if ($conn->query($sql) == true) {
	    header('location:Admin_AddSch.php?done=success');
	}
}


}