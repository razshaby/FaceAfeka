<?php
require_once('..\Functions\checkIfUser.php');
?>
<link href="../CSS/createNewPost.css" rel='stylesheet' type='text/css'/>



<!-- <script type="text/javascript" src="../JS/createNewPost.php"></script> -->

<?php  
include("../JS/createNewPost.php");
//The id myProfile-container must be exist -R
?> 

 
<div id="Cpost" class="CreateNewPost-containter">

 	<form id="form" action="../PostCode/createNewPost_code.php" method="post" enctype="multipart/form-data">

        
             	<textarea id= "MyText" class="flag1" name="StatusText" placeholder="Create a Post: What's on Your Mind?" style="width:100%;   border-radius: 5px;"></textarea>
                <select  id="postPrivacy" name="Privacy" style="border: 5px solid transparent; border-radius: 5px; width:25%">
                    <option>Public</option>
                    <option>Private</option>
                 </select>
        		<input id="uploadImage" type="file" multiple accept="image/*" name="image[]" />
        		<div></div>
        		<input class="SubmitPost"  type="submit" value="Upload Post">
        		
        		
        		<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" />
	</form>
	        		 <div class="alert alert-success" role="alert" id="upload_post_msg"></div><br>
	        		 <div class="alert alert-danger" role="alert" id="upload_post_error_msg"></div>
	
 
 
</div> 

