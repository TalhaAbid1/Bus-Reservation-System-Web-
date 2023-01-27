<?php
include 'dbconn.php';
if (!isset($_POST['submit'])) 
 	{
	 	echo "Not Workin";
	}
else
 	{
	   $fname = trim($_POST['fn']);
	   $lname = trim($_POST['ln']);
	   $uname = trim($_POST['un']);
	   $mail = 	trim($_POST['mail']);
	   $phone = trim($_POST['phone']);
	   $id = 	trim($_POST['idcard']);
	   $pass = 	trim($_POST['pass']);
	   $cpass = trim($_POST['cpass']);
   
if (empty($fname) || empty($lname) || empty($uname) || empty($mail) || empty($phone) || empty($id) || empty($pass) || empty($cpass))
{
	header('location:sign-up.php?error=empty&&fn1='.$fname.'&&ln1='.$lname.'&&un1='.$uname.'&&mail1='.$mail.'&&phone1='.$phone.'&&id1='.$id.'');
}
elseif ($pass!=$cpass) 
{
	header('location:sign-up.php?passerror=mismatch&&pass1=true&&fn1='.$fname.'&&ln1='.$lname.'&&un1='.$uname.'&&mail1='.$mail.'&&phone1='.$phone.'&&id1='.$id.'');
}

else
{
	$sql = "INSERT INTO CUSTOMER(USERNAME , FIRST_NAME , LAST_NAME , EMAIL , PASSWORD , PHONE , ID_CARD ) VALUES ('$uname' , '$fname' , '$lname' , '$mail' , '$pass' , '$phone' , '$id'  )";
if ($conn->query($sql) == true ) 
{
	echo "Data Inserted Successfully";
	header('location:Login.php?signup=success');
}
else
{
	echo "<h1>Unable to Insert</h1><br>".$conn->error;

}
$conn->close();
} 
}
?>
