   $.ajax({
	       type: "POST",
	       url: '../DataBase/getUserImg.php',
	       data: {username: "<?php echo $_SESSION['username']; ?>"},
	       success: function(data){
               $('#userImageProfileSmall').attr('src', data);
               $("#userImageProfileSmall_a").attr("href", data)
	       }
	   });