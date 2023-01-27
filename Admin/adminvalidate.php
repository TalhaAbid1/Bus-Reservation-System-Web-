<?php  

if (!isset($_POST['submit'])) 
{
 	echo "Not Working";
}
else
{
   $uname = $_POST['uname'];
   $pas = $_POST['pass'];

   echo $uname."<br>".$pas;
   
if (empty($uname) || empty($pas)) 
{
	header('location:adminSign.php?error=empty&&uname1='.$uname);
}
elseif ($uname != 'admin' || $pas != 'admin') 
{
	header('location:adminSign.php?fake=invalid&&uname1='.$uname.'&&pass='.$pas);
}
else
{
	header('location:Dashboard.php');	
}

}
?>
