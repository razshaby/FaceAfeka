<?php

include ('..\DataBase\connection.php');

if (isset($_POST["username"])) {
    
    $username = $_POST["username"];
    
   
    $output = '';
    
            $query = "SELECT Img FROM users WHERE Username = '$username' LIMIT 1" ;
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0)
            {

                $row = mysqli_fetch_array($result);
                $img= $row["Img"];
            }
            //$output .= '<img class="img-thumbnail" alt="Cinque Terre" width="304" height="236"  src="'. $img .'">';
            $output.= '<a data-fancybox="myProfile_large" href="'. $img .'"><img width="304" height="236" src="'. $img .'"></a>';
            
            
            //$output.= '<a data-fancybox="gallery" href="https://images3.alphacoders.com/823/thumb-1920-82317.jpg" data-width="304" data-height="236"><img width="304" height="236" src="https://images3.alphacoders.com/823/thumb-1920-82317.jpg"></a>';
            
           // $output.= '<a data-fancybox="gallery" href="https://images3.alphacoders.com/823/thumb-1920-82317.jpg"><img width="304" height="236" src="https://images3.alphacoders.com/823/thumb-1920-82317.jpg"></a>';
            
            
        }
        
    include ('..\DataBase\disconnect.php'); 
    echo $output;
    
?> 