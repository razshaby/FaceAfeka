<?php
include('..\DataBase\connection.php');

if(isset($_POST["input"]))
{
    
    $username=$_POST["username"];
    
    require_once('getFriends.php');
    $friends_array = getFriends($username);
    
    
    
    
    $count=0;
    
    $output = '';
    $input = mysqli_real_escape_string($conn, $_POST["input"]);
    if($input!="*")
        $query = "SELECT Username,Img FROM Users WHERE Username LIKE '".$input."%';";
        else
            $query = "SELECT Username,Img FROM Users;";
            
            
            $result = mysqli_query($conn, $query);
            $output = '<ul class="list-unstyled">';
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    if($row["Username"]!=$username)
                    {
                        //in_array check if the username in the array -R
                        if (!in_array($row["Username"], $friends_array))
                        {
                            
                            $output .= '<li><div class="canAdded">'.$row["Username"].'<img class="small-profile-img" src="'.$row["Img"].'"></div></li>';
                            $count++;
                        }
                    }
                }
            }
            if($count==0)
            {
                $output .= '<li>friend Not Found!</li>';
            }
            $output .= '</ul>';
            echo $output;
            include ('..\DataBase\disconnect.php');
}

?> 