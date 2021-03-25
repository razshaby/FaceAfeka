<?php
function getFriends($username) {
    include('..\DataBase\connection.php');
    
    $query = "SELECT friends FROM Users WHERE Username = '".$username."';";
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        
        
        $row = mysqli_fetch_array($result);
        $friends= $row["friends"];
        
    }
    
    //explode convert string to array, The delimiter is | -R
    $friends_array=explode("|",$friends);
    
    //Disconnect from the DataBase -R
    include('..\DataBase\disconnect.php');
    return $friends_array;
}
?>