<?php
include ('..\DataBase\connection.php');

// Get the Post
if (isset($_POST["username"])) {

    $action = $_POST["action"];
    $username = $_POST["username"];
    // So we can Dislike!

    switch ($action) {
        case "Invite":
            invite($username, $conn,"Invite");
            break;
        case "Invited":
            invite($username, $conn,"Invited");
            break;
        case "Waiting":
            invite($username, $conn,"Waiting");
            break;
    }

    include ('..\DataBase\disconnect.php');

    exit();
}

function invite($username, $conn,$show)
{
    include ('..\FriendsCode\getFriends.php');
    $output = '<ul class="list-unstyled">';
    
    
    $count = 0;
    
    $friends_array = getFriends($username);
    if($show!="Waiting")
    $query = "SELECT * FROM games WHERE player1 = '" . $username . "';";
    else
    $query = "SELECT * FROM games WHERE player2 = '" . $username . "';";
        
    $result = mysqli_query($conn, $query);
    $invitedFriends =array();
    $notInvitedFriends=array();
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            if($show!="Waiting")
            array_push($invitedFriends, $row["player2"]);
            else
           array_push($invitedFriends, $row["player1"]);
                
        }
    }
    foreach ($friends_array as $value)
    {
        if(!in_array($value, $invitedFriends))
            array_push($notInvitedFriends, $value);
            
    }
    
    $not_string="not";
    if(($show=="Invited") || ($show=="Waiting"))
    {
        $notInvitedFriends=$invitedFriends;
        $not_string="";
        if($show=="Waiting")
            $not_string="Waiting";
    }
 
    
    foreach ($notInvitedFriends as $value)
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
            $imgPlay="..\images\play.png";
            
            if($show!="Invite")
            {
                
                
             
                
//                 if($show=="Invited")
//                 {
                    $param1=$username;
                    $param2=$value;
                    
                  
                
//                 }
//                 else 
//                 {
//                     $param1=$value;
//                     $param2=$username;
//                 }
if($show=="Invited")
                {
                $query = "SELECT gameCode FROM games WHERE player1 = '$param1' and player2= '$param2' LIMIT 1" ;
                }
                else
                {
                    $query = "SELECT gameCode FROM games WHERE player1 = '$param2' and player2= '$param1' LIMIT 1" ;
                    
                }
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $param3= $row["gameCode"];
                
                $link="http://localhost:5000/?param1=".$param1."&param2=".$param2."&param3=".$param3;
                
                $output .= '<a target="_blank" href="'.$link.'"><img class="playgame" src="'. $imgPlay .'"></a>';
            }
            
            $output .= '<li><div class="'.$not_string .'InvitedFriendsList">' . $value .
            
            '<img class="small-profile-img" src="'. $img .'"></div></li>';
            $count ++;
        }
    }
    
    
    if ($count == 0)
    {
        //$output= '<label> No friends to invite!</label>';
        
        if($show=="Invited")
            $output=' <div class="alert alert-info" role="alert" id="No_friends_msg">You didn\'t invite anyone!</div><br>';
         else
         {
             if($show=="Invite")
             $output=' <div class="alert alert-info" role="alert" id="No_friends_msg">No friends to invite!</div><br>';
             else 
                 $output=' <div class="alert alert-info" role="alert" id="No_friends_msg">Nobody sent you invitation!</div><br>';
                 
         }
        echo $output;
        exit();
    }
    $output .= '</ul>';
    echo $output;
    
    
}

?> 