<?php
include('..\DataBase\connection.php');
if(isset($_POST["username"]))
{
    
    $username=$_POST["username"];
    $friend=$_POST["friend"];
    $output = '';
   
    $query = "SELECT friends FROM Users WHERE Username = '".$username."';";
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        
        
        $row = mysqli_fetch_array($result);
        $friends= $row["friends"];
        $friends=$friends . $friend . "|";
        
        
       // $query = "UPDATE Users SET friends=" . $friends . "Username = '".$username."';";
       
        $query =  "UPDATE Users SET friends='". $friends ."'WHERE Username = '".$username."';";
        mysqli_query($conn, $query);
    }
    
include ('..\DataBase\disconnect.php');
echo $friend;
exit();
}

?> 