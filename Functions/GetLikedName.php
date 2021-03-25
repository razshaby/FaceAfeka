<?php
function getLikedName($postid,$username) {
    include('..\DataBase\connection.php');
    $output = 'Liked By: ';

    
    $query = "SELECT Likes FROM post WHERE PostID = '".$postid."';";
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        
        
        $row = mysqli_fetch_array($result);
        $likes= $row["Likes"];
        $arrayLikes=explode("|",$likes);
        
        if(count($arrayLikes)!=1)
        {
            foreach($arrayLikes as $likeName)
            {
                $output .= $likeName.',';
            }
            $output = substr($output, 0, -2);
            
        }
        else 
        {
            $output = 'No likes yet!';
        }

    }
    include('..\DataBase\disconnect.php');
    return $output;
}
?>