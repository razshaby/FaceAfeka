<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
$path = '../images/upload/'; // upload directory
$pathThumb = '../images/thumbs/'; // upload directory
$thumbWidth = 120;
$final_MultiImg ='';

$maxImgNumber= 6; 
$maxImgNumber--;// start from 0 -R
$limitNumberOfimages=false;

if (isset ($_FILES['image']))
{
            $status=$_POST["StatusText"];
            $username=$_POST["username"];
            
            $privacy=$_POST["Privacy"];
            if($status != "")// Check if Status Null First! -R 
            {
                    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
                                
                                    $img = $_FILES['image']['name'][$i];
                                    $tmp = $_FILES['image']['tmp_name'][$i];
                                    // get uploaded file's extension
                                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                                    if(!$limitNumberOfimages||($i <= $maxImgNumber))
                                    {
                                                    // can upload same image using UNIQ function + extension! - S
                                                    $final_image = uniqid().'.jpg';
                                                    // Sleep microSecond to Confirm No double Uniq. ALTHOUGH BEST TO CHECK UNIQ AGAIN! - S
                                                    usleep(1);
                                                    if(in_array($ext, $valid_extensions))// check's valid format
                                                    {
                                                        $path = $path.strtolower($final_image);
                                                        if(move_uploaded_file($tmp,$path))
                                                        {
                                                                    //The path in createNewPost is diffrent from createNewPost_code path - without the ../
                                                         
                                                                    
                                                                    // loop through it, looking for any/all JPG files:
                                                
                                                
                                                                    // load image and get image size WORKD WITH JPG ONLY! so that's Why finalImage always JPG
                                                                    $img = imagecreatefromjpeg( "{$path}");
                                                                    // 
                                                                    $width = imagesx( $img );
                                                                    $height = imagesy( $img );
                                                                    // calculate thumbnail size
                                                                    $new_width = $thumbWidth;
                                                                    // This so it Scales Good
                                                                    //$new_height = floor( $height * ( $thumbWidth / $width ) );
                                                                    //Not Scaling good but keep's 120 120
                                                                    $new_height = $thumbWidth;
                                                                    // create a new tempopary image
                                                                    $tmp_img = imagecreatetruecolor( $new_width, $new_height );
                                                                    // copy and resize old image into new image
                                                                    imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
                                                                    // save thumbnail into a file
                                                                    imagejpeg( $tmp_img, "{$pathThumb}{$final_image}" );
                                                                   
                                                                    // Refresh! path is changed always with substr... - S
                                                                    $path = '../images/upload/';
                                                                    // Add this to Final Img INFO! we split it later!
                                                                    $final_MultiImg .=$final_image.'|';      
                                                        }
                                                        else 
                                                        {
                                                            echo 'invalid';
                                                            exit();
                                                        }
                                                    }
                                    }
                        }
                    
                    
                    
                    
                    date_default_timezone_set('Asia/Jerusalem');
                    $date = date("Y-m-d H:i:s");
                    
                    //include database configuration file
                    include('..\DataBase\connection.php');
                    $final_image .='|';
                    //insert form data in the database
                    $insert = $conn->query("INSERT INTO post (Status,ImgSrc,Publisher,Privacy,Date) VALUES
                                 ('$status','$final_MultiImg','$username','$privacy','$date')");
                    include('..\DataBase\disconnect.php');
                    
                    echo "successfuly"; 
                    
            }
            else
            {
                     echo "Status Text is Empty";
            }
}
else 
{
    echo "The maximom size is 8MB";
}
?>