   $.ajax({
	       type: "POST",
	       url: '../MyProfileCode/myprofile_code.php',
	       data: {username: "<?php echo $_SESSION['username']; ?>"},
	       success: function(data){
	    	   $('#myProfile-container').fadeIn(data);
               $('#myProfile-container').html(data);
	       }
	   });