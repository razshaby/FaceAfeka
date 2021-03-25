<?php

include('..\DataBase\connection.php');

// Get the Post
if(isset($_POST["username"]))
{
    
    $username=$_POST["username"];// UserName is the Post UserName!
    $postID= $_POST["input"];
    // So we can Dislike!
    $newLike="";
    $query = "SELECT Likes FROM post WHERE PostID = '".$postID."';";
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        
        
        $row = mysqli_fetch_array($result);
        $likes= $row["Likes"];
        $arrayLikes=explode("|",$likes);
        //Check if Already did LIKE! - S // NOT than DISLIKE!
        if(in_array($username, $arrayLikes))
        {
            // Little Bit Complicated but if liked in Middle need to delete only MIDDLE! - S
            //Run a loop on all likes !
            foreach($arrayLikes as $liked)
            {
                // If same Thing
                if($liked == $username)
                {
                    //Do nothing!
                }
                else {
                   // Add new Likes! - S
                   // Clear newLike First! - S
                   // Check if not NULL so call - S
                    if($liked!='')
                    {
                    $newLike .= $liked."|";
                    }
                }
                // Update new Like's! 
                $query =  "UPDATE post SET Likes='". $newLike ."'WHERE PostID = '".$postID."';";
                mysqli_query($conn, $query);
            }

        }
        else {
            $likes=$likes.$username."|";
            //Update the INPUT!
            $query =  "UPDATE post SET Likes='". $likes ."'WHERE PostID = '".$postID."';";
            mysqli_query($conn, $query);
        }

    }
    
    include ('..\DataBase\disconnect.php');
    echo $newLike;
    exit();
}

?> 