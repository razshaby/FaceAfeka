<?php

include('..\DataBase\connection.php');

// Get the Post
if(isset($_POST["username"]))
{
    

    $postID= $_POST["postID"];
    $Privacy=$_POST["privacy"];
    // So we can Dislike!

    
    $query =  "UPDATE post SET Privacy='".$Privacy."'WHERE PostID = '".$postID."';";
    mysqli_query($conn, $query);

    
    include ('..\DataBase\disconnect.php');

    exit();
}

?> 