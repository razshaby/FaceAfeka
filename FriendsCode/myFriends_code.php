<?php

include ('..\DataBase\connection.php');

if (isset($_POST["username"])) 
{

            $username = $_POST["username"];
           
            include ('getFriends.php');
        
            $friends_array = getFriends($username);
            $count = 0;
            $output = '<ul class="list-unstyled">';
        
            foreach ($friends_array as $value) 
            {
                //because spaces include in friends_array
                if (!(strlen(trim($value)) == 0))
                {
                    $query = "SELECT Img FROM users WHERE Username = '$value' LIMIT 1" ;
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        $row = mysqli_fetch_array($result);
                        $img= $row["Img"];   
                    }
                    $output .= '<li><div class="myFriendsList">' . $value . 
                    
                    '<a data-fancybox="profile_my_friends_list'.$value.'" href="'.$img.'"><img class="small-profile-img" src="'. $img .'"></a></div></li>';
                    $count ++;
                }
            }
        
            
            if ($count == 0)
            {
                $output= '<label> No friends yet!</label>';
                echo $output;
                exit();
            }
            $output .= '</ul>';
            include ('..\DataBase\disconnect.php');
            echo $output;
}

?> 