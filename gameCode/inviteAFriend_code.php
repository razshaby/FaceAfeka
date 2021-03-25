<?php

if(isset($_POST["username"]))
{
    include('..\DataBase\connection.php');
    
    $username=$_POST["username"];
    $friendToInvite=$_POST["friendToInvite"];
    
    
    $randomNum=rand(0,100000);
    $query = "INSERT INTO games (player1,player2,gameCode) VALUES ('$username','$friendToInvite','$randomNum')";
    mysqli_query($conn,$query);

    
    include ('..\DataBase\disconnect.php');

}


?>