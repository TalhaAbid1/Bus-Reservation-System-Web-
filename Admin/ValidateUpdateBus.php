<?php
include 'dbConn.php';
 if (!isset($_GET['submit'])) 
 {
 	echo "Not Working";

 }
 else{

   $bnumber = $_GET['bn'];
   $bmodel = $_GET['bm'];
   $tseats = $_GET['ts'];
   echo $tseats;
if (empty($bmodel) || empty($tseats)) 
{
	header('location:UpdateBus.php?error=empty&&number='.$bnumber.'&&bm1='.$bmodel.'&&ts1='.$tseats.'');
}
else
{
	$sql = "UPDATE vehicle SET `MODEL` = '$bmodel',`TOTAL_SEATS` = '$tseats' WHERE `NUMBER` = '$bnumber'";
	if($conn->query($sql) == true) 
		{
			header('location:Admin_BusDetails.php?done=update');
		}
	else
		{
			echo "<h1>Unable to Insert</h1><br>".$conn->error;
		}
// $conn->close();
	}
}
?>