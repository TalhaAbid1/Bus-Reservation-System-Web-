<?php
session_start();
include 'dbconn.php';
if (!isset($_POST['submit'])) 
 	{
	 	echo "Not Working";
	}
else
 	{
	   $user = $_POST['username'];
	   $opass = $_POST['pass'];

if (empty($user) || empty($opass))
{
	header('location:Login.php?error=empty&&user1='.$user.'&&pass1='.$opass.'');
}

else
{
	$sql ="SELECT * FROM customer WHERE USERNAME Like '$user' AND PASSWORD Like'$opass'";

    $result = $conn->query($sql);
if ($result->num_rows>0) 
{   
    while ($row = $result->fetch_assoc()) {
        	  $_SESSION["username"]= $row['USERNAME'];
        	  $_SESSION["firstname"]= $row['FIRST_NAME'];
        }

	if (isset($_SESSION["seatSelect"])) {

	    header('location:confirmBooking.php');
	}
	else{
         
        


		header('location:index.php');
	}


}
else
{
//	echo "<h1>NO SUCH USER EXIST.</h1><br>".$conn->error;
	header('location:Login.php?wrong=true');
}
$conn->close();
}
}
?>
