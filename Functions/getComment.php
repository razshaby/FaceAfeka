<?php
// Get the Connection - S



// Function GetPost enter's DataBase -S
function getComment($postid,$conn) {
    // Creating Empty Array -S
    $emptyArray = array();
    $htmlOutput = "";
    // First Get all you'r friend's! - S
    $query = "SELECT * FROM comment WHERE PostID = '".$postid."';";
    // Get the SQL query - S
    $result = mysqli_query($conn, $query);
    // Do you Even HaVe Friend's??? -S
    while ($row = mysqli_fetch_assoc($result)) {
        // Get the STRING or ROW friend's - S
        $CommentID = $row["commentID"];
        $Comment = $row["Comment"];
        $Likes = $row["Likes"];
        $Postid = $row["PostID"];
        $Date = $row["Date"];
        $PublisherName =$row['Publisher'];
        
        $queryImg = "SELECT Img FROM Users WHERE Username = '".$PublisherName."';";
        $resultImg = mysqli_query($conn, $queryImg);
        if(mysqli_num_rows($resultImg) > 0)
        {
            
            $rowImg = mysqli_fetch_array($resultImg);
            $image= $rowImg["Img"];
            
        }
        // Explode Like's Array!
        $likesNumber=-1; // Start with -1 Cause well... - S
        // If  NULL function not Need'd! - S
        if($Likes != NULL)
        {
            $arrayLikes=explode("|",$Likes);
            foreach($arrayLikes as $like)
            {
                $likesNumber++;
            }
        }
        else {
            $likesNumber = 0;
        }
            //Comment Class Open - S
            $htmlOutput .="<div class='CommentBox'>";
            
            
            
            //Open Class Head / img user name and Date - S
            
            $htmlOutput .= "<div class='CommentHead'>";

            $htmlOutput .= "<a data-fancybox='profileImageComment".$CommentID."' href='".$image."'>";
            $htmlOutput .= "<img class='small-profile-img-Post' src=".$image.">";
            $htmlOutput .= "</a>";

            $htmlOutput .= "<div style='float:right; padding-right:20px;font-weight: bold;'>";
            $htmlOutput .="Comment Respond Date: ".$Date;
            $htmlOutput .= "</div>";

            $htmlOutput .= "</div>"; // PostHead
            $htmlOutput .= "<div style='font-weight: bold;font-size:20px;'>";
            $htmlOutput .="User: ".$PublisherName;
            $htmlOutput .= "</div>";
            
 
            $htmlOutput .= "<div class='postText'>";
            $htmlOutput .= $Comment;
            $htmlOutput .= "</div>"; //PostText
            /* NO NEED FOR NOW!
            $htmlOutput .= "<button type='button' style='margin-right:10px;'  class='likeButton' >Like</button>";
            $htmlOutput .="<div>";//PostLike
            $htmlOutput .= 'Likes: '.$likesNumber;
            $htmlOutput .="</div>";
            */
            
            //Comment CLASS CLOSE - S
            $htmlOutput .= "</div>";
            
        
    }

    return $htmlOutput;
}
?>