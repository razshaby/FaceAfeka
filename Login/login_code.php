<?php
session_start();
// Run this  One's Dont keep the PHP data -S
require_once('..\DataBase\DataBaseHandler.php');
// Here good to know if we failed! Session -! - S

//Get the username info and password info -S
if (isset($_POST["username"]) && isset($_POST["password"])){
    //Connecting to DataHandler Object --> DataBase
    $db = new DataHandler();
    // Checking the Password 
    $result = $db->CheckUserPassword($_POST["username"], $_POST["password"]);
    
    // if result = true Go MainPage - S
    if ($result){
        $_SESSION['username'] = $_POST["username"];
        header('location: ..\MainPage\userPage.php');
        return;
    //if resoult = false enter  Back to same Page! -S
    } else {
        // Fail Session gonna be Send to index.php (NOTICE SAME NAME Wrong password) - S
        $_SESSION['Wrong Password'] = "Username or password is Incorrect.";
        header('location:../index.php');
        return;
    }
}
//die();
?>