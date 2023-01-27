<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'alpha_express';

$conn = mysqli_connect($servername , $username , $password , $database) or die("UNABLE TO CONNECT TO DATABASE".mysqli_connect_error());
//echo "Connected to database succesfully"."<br>";

?>