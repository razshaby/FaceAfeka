<?php
if(!isset($_COOKIE["PHPSESSID"]))
{
    session_start();
}

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ..\index.php');
}
if (isset($_GET['logout'])) {
    session_unset(); 
    session_destroy();
    header('location: ..\index.php');
}



?>