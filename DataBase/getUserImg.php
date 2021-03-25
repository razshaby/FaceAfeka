<?php

include ('..\DataBase\connection.php');

if (isset($_POST["username"])) {
    
    $username = $_POST["username"];
    
    
    $output = '';
    
    $query = "SELECT Img FROM users WHERE Username = '$username' LIMIT 1" ;
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        $img= $row["Img"];
    }
    $output.=  $img;

}

include ('..\DataBase\disconnect.php');
echo $output;
exit();
?> 