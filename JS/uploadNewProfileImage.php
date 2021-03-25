<script>
$(document).ready(function (e) {
	 $('#upload_profileImage_msg').hide();
	
	 $('#err_myProfile').hide();
	 
	$("#form_change_profile_image").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "../MyProfileCode/uploadNewProfileImage_code.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				$("#err_myProfile").fadeOut();
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					// invalid file format.
					$("#err_myProfile").html("Invalid File !").fadeIn();
				}
				else
				{
					
			    	
			    	
					$("#form_change_profile_image")[0].reset();	//reset form_change_profile_image fields -R
					
					
					  $('#upload_profileImage_msg').fadeIn().html(data);
                      setTimeout(function(){  
                           $('#upload_profileImage_msg').fadeOut("Slow");  
                      }, 2000); 
                      
                    
                      
                      
                      <?php  
                  	    	include('..\Functions\showUserPhoto.php'); //The id myProfile-container must be exist -R
                  	    	?> 



                  	    	<?php  
                  	    	    	include('..\Functions\updateUserProfileLogo.php'); //The id myProfile-container must be exist -R
                  	    	    	?>  
					
				}
		    },
		  	error: function(e) 
	    	{
				$("err_myProfile").html(e).fadeIn();
	    	} 	        
	   });
	}));
});
</script>
