<?php

if(isset($_POST["username"]))
{
    include('..\DataBase\connection.php');
    
    $username=$_POST["username"];
    $friendToCancleInvitation=$_POST["friendToCancleInvitation"];
    
    
   
   $query = "DELETE FROM games WHERE player2='". $friendToCancleInvitation . "' AND player1='".$username."'";
    
    mysqli_query($conn,$query);
    
    
    include ('..\DataBase\disconnect.php');
    
}


?>