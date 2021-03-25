<?php

require_once('..\DataBase\connection.php');
require_once('getPostSecondCondition.php');
require_once('..\Functions\getComment.php');
require_once('Liked.php');
require_once('..\Functions\GetLikedName.php');
 $POSTCOUNT = 8;
 $pathThumb = '../images/thumbs/';
 $pathReal = '../images/upload/';
 
 // Get the Post
if(isset($_POST["username"]))
{

    $username=$_POST["username"];// UserName is the Post UserName!
    $showUserPost='';
    if(isset($_POST["friendToShow"]))
    {
    $showUserPost=$_POST["friendToShow"];
    }
    $post_array = getPost($username,$conn,$showUserPost); // Get the Array of all post each contain's 6 - S// Return the Array - S
    $output = "";
    $counter = 0;// We know it's Return as $POSTCOUNT ... block is $POSTCOUNT array's - S


    foreach($post_array as $post)    // Basicly working with all array that i Know each post is $POSTCOUNT !
    {
        $counter++;
        // ** ONE post Logic ! $POSTCOUNT = we are reciving big array ! if it's 0 no post's if it's 1 post it contains 8 Object's as a Post!
            
        //array_push(**THIS IS THE POST ARRAY WE GET**  1/$status 2/$image 3/$Date 4/$likesNumber 5/$Privacy 6/$PublisherName 7/$PostImg 8/$Postid);
        if($counter == 1) // Status
        {
            $status= $post;
        }
        else if($counter == 2) // User Image
        {
            $userimg = $post;
        }
        else if($counter == 3 ) // Date
        {
            $PublishDate = $post;
        }
        else if($counter == 4 ) // LikesNumber
        {!
            $LikesNumber = $post;
        }
        else if($counter == 5 )// Privacy
        {
            $privacy = $post;
        }
        else if($counter == 6 ) // PublisherName
        {
            $PublisherName = $post;
        }
        else if($counter == 7 ) // PostImg
        {
            $ImageString = $post;
        }
        else if($counter == 8 ) // PostID!
        {
            $postid =$post;
        }
        
       
        // Function to Check if we on last Array element - S

        // Will run only when 8 ! done
        if($counter >= $POSTCOUNT)
        {
            

            
                            $counter = 0; // so we not gonna enter this Loop ! Again! on next 8 Objects! - S
                            $output .= "<div class='postCss'>"; // Open New class POST! 
                            
                            $ImgCreator = array(); // New Array!
                            // Making the postHead DIV!

                            $output .= "<div class='postHead'>"; //OPEN CLASS postHead!
                            
                            // Getting the Publich and non Public - S + DATE
                            if($PublisherName == $username) // YES
                            {
                                
                                $output .= "<div style='float:right;padding-right:20px;font-weight:bold;'>";
                                
                                // The Select Option! - S
                                $output .= "<select class='PrivecyOption' id=".$postid." name='Privacy' style='border-radius: 8px;width:20$;'>";
                                $output .= "<option>$privacy</option>";
                                //if Put the Same Option as First! that is Already ON!
                                // so The Option always THE ONE you PUT!
                                if($privacy == 'Public')
                                {
                                    $output .= "<option>Private</option>";
                                }
                                else if ($privacy == 'Private')
                                {
                                    $output .= "<option>Public</option>";
                                }
                                 // Close Select! - S

                                $output .= "</select>";
                                
                                $output .= "</div>";
                                $output .= "<div style='float:right;padding-right:20px;font-weight:bold;'>";
                                $output .=''.$PublishDate; // Date
                                $output .= "</div>";
                            }
                            else // NO
                            {
                                $output .= "<div style='float:right;padding-right:20px;'>";
                                $output .=''.$privacy; // Privacy
                                $output .= "</div>";
                                $output .= "<div style='float:right;padding-right:20px;'>";
                                $output .=''.$PublishDate; // Date
                                $output .= "</div>";
                            }
                            
                            
                            $output .= '<a data-fancybox="profile'.$postid.'" href="'.$userimg.'">';
                            $output .= "<img class='small-profile-img-Post' src=".$userimg.">";
                            $output .= '</a>';
                           
                            // USER NAME! // going Under the Name's
                            $output .= "<div style='font-weight: bold'>"; //Open
                            $output .='User: '.$PublisherName.'</div>';

                            

                            // Close the postHead DIV!
                            $output .= "</div>";
                                             

                            // Satus INFO !
                            $output .= "<div class='postText'>";
                            $output .= $status;
                            $output .= "</div>";
                            // Create Img's HERE
                            
                            if($ImageString !=NULL) // Check if Post EVEN have IMG!? - S
                            {
                                // Explode the |
                                $arrayImages=explode("|",$ImageString);
                                // For each Image inside the String - S
                                foreach ($arrayImages as $postImg)
                                {
                                    // Check again if Split not returning last as nothing - S
                                    if($postImg != '') // not ''- S
                                    {
                                    $output.= '<a data-fancybox="UploadedImg'.$postid.'" href="'. $pathReal.$postImg.'">';
                                    
                                    $output .='<img class="UploadedImg" ';
                                    $output .='src="'.$pathThumb.$postImg;
                                    $output .='"';
                                    $output .='>';
                                    
                                    $output .='</a>';
                                    }
                                    
                                }
                             
                            }
                            
                            
                            
                            $output .= "<div class='postButton'>";
                            $output .= "<div style='float:left;padding-top:10px;color:red;font-weight: bold'>";
                            // Check if Already Like'd - S
                            if(getLikes($postid,$username))
                            {
                                $output .= "<button type='button' id='$postid' style='margin-right:10px;'  class='liked' >";
                                $output .= "<span>Liked</span>";
                                $LikeString = getLikedName($postid,$username);
                                $output .= "<span class='tooltiptext'>$LikeString</span>";
                                $output .= "</button>";
                                $output .= ''.$LikesNumber;
                                $output .= "</div>";
                            }
                            else
                            {
                                $output .= "<button type='button' id='$postid' style='margin-right:10px;'  class='button-like' >";
                                
                                $output .= "<span>Like</span>";
                                $LikeString = getLikedName($postid,$username);
                                $output .= "<span class='tooltiptext'>$LikeString</span>";
                                $output .= "</button>";
                                $output .= ''.$LikesNumber;
                                $output .= "</div>";
                            }
                            // Close the Lower Div PostButton's - S
                            $output .= "<textarea id='text$postid' class='CommentText' name='CommentText' placeholder='Comment...' style='width:100%; border-radius: 5px; margin-top:15px;'></textarea>";
                            $output .= "<button type='button' id='$postid' class='CommentButton'>Comment</button>";
                            $output .= "</div>";
                           
                            // Here Gonna Get Comment's IF here!
                            // Return's a full Box !
                            $Comment_HTML = getComment($postid,$conn); // Get Array of all Comment's! - S
                            // Only IF comment's Exist ! - S
                                
                                $output .= $Comment_HTML;
                            
                            

                            $output .= "</div>"; // Close the DIV !

        }
    }

    echo $output;
}

?> 