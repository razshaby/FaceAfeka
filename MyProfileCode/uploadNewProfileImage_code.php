<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = '../images/profiles/'; // upload directory

//if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
if($_FILES['image'])
{
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $username=$_POST["username"];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    // can upload same image using rand function
    //$final_image = rand(1000,1000000);//.$img;
    $final_image = uniqid().'.jpg';
    // check's valid format
    if(in_array($ext, $valid_extensions))
    {
        $path = $path.strtolower($final_image);
        if(move_uploaded_file($tmp,$path))
        {
            //The path in createNewPost is diffrent from createNewPost_code path - without the ../
            //echo "<img src='$subPath' />";
            echo "The Image successfuly updated";
      
            
            //include database configuration file
            include('..\DataBase\connection.php');
            
            //insert form data in the database
            //$insert = $conn->query("INSERT posts (name,email,file_name) VALUES ('".$name."','".$email."','".$path."')");
            
//             $insert = $conn->query("INSERT INTO post (Status,ImgSrc,Publisher,Privacy,Likes,Date) VALUES
//              ('$status','$subPath','$username','$privacy','$likes','$date')");
            
            
            $update = $conn -> query("UPDATE users SET Img = '$path' WHERE Username = '".$username."';");
            
            include ('..\DataBase\disconnect.php');
            
            
            //echo $insert?'ok':'err';
        }
    }
    else
    {
        echo 'invalid';
    }
}


?>