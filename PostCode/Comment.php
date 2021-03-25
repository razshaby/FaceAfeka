<?php

include('..\DataBase\connection.php');

// Get the Post
if(isset($_POST["username"]))
{
    
    $text = $_POST["text"];
    // if NOT NULL!
    if($text != '')
    {
    $username=$_POST["username"];// UserName is the Post UserName!
    $postID= $_POST["postID"];
    
    date_default_timezone_set('Asia/Jerusalem');
    $date = date("Y-m-d h:i:s");

    $query = "INSERT INTO comment (PostID, Comment, Publisher, Date) VALUES ('$postID','$text','$username','$date')";
    
    mysqli_query($conn,$query);
    
   
    }
    include('..\DataBase\disconnect.php');
}

?> 