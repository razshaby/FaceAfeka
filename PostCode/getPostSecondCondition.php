<?php
// Get the Connection - S
require_once('..\DataBase\connection.php');


// Function GetPost enter's DataBase -S
function getPost($username,$conn,$friend='') {
    // Creating Empty Array -S
    $emptyArray = array();
    // First Get all you'r friend's!
    $query = "SELECT friends FROM Users WHERE Username = '".$username."';";
    // Get the SQL query - S
    $result = mysqli_query($conn, $query);
    // Do you Even HaVe Friend's??? -S
    if(mysqli_num_rows($result) > 0)
    {
        
        // Get the Rows of the SQL
        $row = mysqli_fetch_array($result);
        // Get the STRING or ROW friend's - S
        $friends= $row["friends"];
        
    }
    // Make Array of friend's - NOW WE HAVE THE ARRAY S 
    $friends_array=explode("|",$friends);

    // GET ALL THE POST
    // POSTID always Go's up Increment so new post is Biggest always! - S
    $query = "SELECT * FROM post ORDER BY PostID DESC";
    $result = mysqli_query($conn, $query);
    // Run the Wile Look!
    while ($row = mysqli_fetch_assoc($result)) 
    {
            // here we Take example of Row!
            $PublisherName = $row["Publisher"];
            // IF publisher Name is you'r Friend's Name! do something else dont!
            if(
                    (                   ($friend=='')//show my friends
                                            &&
                        (   (in_array($PublisherName, $friends_array) && $row["Privacy"]!="Private")    ||  ($PublisherName == $username)  )
                    )
                    
                    ||
                    
                        (($friend==$PublisherName )&&($row["Privacy"]!="Private"))
                        
                    ||
                (($friend==$username )&&($PublisherName==$username))
                )
            {
               
                
                                 /// Working to Get IMG notice not same Query - S 
                        $queryImg = "SELECT Img FROM Users WHERE Username = '".$PublisherName."';";
                        $resultImg = mysqli_query($conn, $queryImg);
                        if(mysqli_num_rows($resultImg) > 0)
                        {
                            
                            $rowImg = mysqli_fetch_array($resultImg);
                            $image= $rowImg["Img"];
                            
                        }
                
                        // Push all info Inside!
            
                        $status = $row["Status"];
                        $Privacy = $row["Privacy"];
                        $Likes = $row["Likes"];
                        $PostImg = $row["ImgSrc"];
                        $Postid = $row["PostID"];
                        // Explode Like's Array!
                        $likesNumber=-1; // Start with -1 Cause well... - S
                        // If  NULL function not Need'd! - S
                        if($Likes != NULL)
                        {
                            $arrayLikes=explode("|",$Likes);
                            foreach($arrayLikes as $like)
                            {
                                // Check if NOT NULL! - S
                                if($like != "");
                                {
                                $likesNumber++;
                                }
                            }
                        }
                        else 
                        {
                            $likesNumber = 0;
                        }
                        
                        $Date = $row["Date"];
                        // Push all the info Gatherd to Array int 6 ! remmember - S
                        array_push($emptyArray,$status,$image,$Date,$likesNumber,$Privacy,$PublisherName,$PostImg,$Postid);
            }
    
            // Return the Array not empty tho -
    
    }
    return $emptyArray;
}
?>