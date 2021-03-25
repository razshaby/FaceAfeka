<?php
function getLikes($postid,$username) {
    include('..\DataBase\connection.php');
    

    
    $query = "SELECT Likes FROM post WHERE PostID = '".$postid."';";
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        
        
        $row = mysqli_fetch_array($result);
        $likes= $row["Likes"];
        $arrayLikes=explode("|",$likes);
        //Check if Already did LIKE! - S
        if(in_array($username, $arrayLikes))
        {
            include ('..\DataBase\disconnect.php');
            return true;
        }
        else {
            include ('..\DataBase\disconnect.php');
            return false;
        }
        
    }
    

}
?>