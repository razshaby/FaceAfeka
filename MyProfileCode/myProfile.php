<?php
require_once('..\Functions\checkIfUser.php');
?>
    <link href="../CSS/myProfile.css" rel='stylesheet' type='text/css' /> 



<script>  
     $(document).ready(function(){  
    	//Update profile photo under the id  myProfile-container -R
    	<?php  
    	include('..\Functions\showUserPhoto.php'); //The id myProfile-container must be exist -R
    	?>         
     });  
</script>


<?php  
    	include('..\JS\uploadNewProfileImage.php'); //The id myProfile-container must be exist -R
?>  


<br>
<p class="bg-info">Current profile picture:</p>
<div id="myProfile-container">

</div> 

<div></div>

<p class="bg-info">Change profile picture:</p>


<form id="form_change_profile_image" action="createNewProfileImage_code.php" method="post" enctype="multipart/form-data">

        		<input id="uploadProfileImage" type="file" accept="image/*" name="image" />
        		<div></div>
        		<input class="SubmitPost"  type="submit" value="Upload new profile image">
        		<div class="alert alert-success" role="alert" id="upload_profileImage_msg"></div><br>
	
	<div id="err_myProfile" class="p-3 mb-2 bg-danger text-white"></div>
        		<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" />
	</form>
	
	

	