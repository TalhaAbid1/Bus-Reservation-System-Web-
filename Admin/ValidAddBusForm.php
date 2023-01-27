<?php
include 'dbConn.php';
 if (!isset($_POST['submit'])) 
 {
 	echo "Not Working";

 }
 else{

   $bnumber = $_POST['bn'];
   $bmodel = $_POST['bm'];
   $tseats = $_POST['ts'];
   
if (empty($bnumber) || empty($bmodel) || empty($tseats)) 
{
	header('location:Admin_AddBus.php?error=empty&&bn1='.$bnumber.'&&bm1='.$bmodel.'&&ts1='.$tseats.'');
}
else
{
	$sql = "INSERT INTO vehicle(`NUMBER` , `MODEL` , `TOTAL_SEATS`) VALUES ('$bnumber' , '$bmodel' , '$tseats')";
	if($conn->query($sql) == true) 
		{
			header('location:Admin_AddBus.php?done=success');
		}
	else
		{
			echo "<h1>Unable to Insert</h1><br>".$conn->error;
		}
// $conn->close();
	}
}
?>