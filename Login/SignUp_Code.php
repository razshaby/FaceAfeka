<?php
session_start();


//initialising variables
include('..\DataBase\DataBaseHandler.php');

$datahandler = new DataHandler();



$errors =array();

//connect to db -R
//$db= mysqli_connect('localhost','root','','FaceAfekaDATA') or die("could not connect to database");
require_once('..\DataBase\connection.php');

//Register users -R
if (isset($_POST['reg_user'])) {
//mysqli_real_escape_string function escapes special characters in a string for use in an SQL statement -R
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);
$img="../images/anonymous.jpg";

//form validation -R

if (empty($username)) {array_push($errors, "Username is required");}
if (empty($password_1)) {array_push($errors, "Password is required");}
if($password_1 != $password_2)
{
    array_push($errors, "Password and confirm password does not match
");
}

// check db for existing user with same username -R

$user_check_query = "SELECT * FROM users WHERE Username = '$username' LIMIT 1" ;

$result = mysqli_query($conn,$user_check_query);

//mysqli_fetch_assoc - returns an associative array that corresponds to the fetched row or FALSE if there are no more rows -R

//Username is the name in the dataBase
if(mysqli_num_rows($result) > 0)
{
  
        array_push($errors, "Username already exists");
}


    
//Importent to add friend algorithem
if (strpos($username, '!') !== false) {
        array_push($errors, "The character \"!\" not allowed");
    }
    
    //Importent to add friend algorithem
    if (strpos($username, '|') !== false) {
        array_push($errors, "The character \"|\" not allowed");
    }
    

//Register the user uf no error
if(count($errors) == 0)
{
    $password= $datahandler->CalculatePassword($password_1); //this will encrypt the password -R
    $query = "INSERT INTO users (Username,Password,Img) VALUES ('$username','$password','$img')";
    
    mysqli_query($conn,$query);
    $_SESSION["username"]=$username;
    
    header('location: ../MainPage/userPage.php');
}



}


include ('..\DataBase\disconnect.php');

?>