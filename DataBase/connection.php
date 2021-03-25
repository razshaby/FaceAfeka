<?php
//In this file we write code for connection with database -R
$conn = mysqli_connect("localhost","root","","FaceAfekaDATA");

if(!$conn)
{
	echo "Database connection faild...";
}
?>