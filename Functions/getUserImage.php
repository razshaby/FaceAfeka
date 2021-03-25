<?php
function getUserImage($username) {
    include('..\DataBase\connection.php');
    $query = "SELECT Img FROM Users WHERE Username = '".$username."';";
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        
        $row = mysqli_fetch_array($result);
        $image= $row["Img"];
        
    }
    
    
    
    //Disconnect from the DataBase -R
    include('..\DataBase\disconnect.php');
    return $image;
}
?>