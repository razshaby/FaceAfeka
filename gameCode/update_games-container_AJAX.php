 if (typeof action_selected === 'undefined') {
      	var action_selected="Invite";

}
 
 
 $.ajax({
        	       type: "POST",
        	       url: '../gameCode/games_code.php',
        	       data: {action: action_selected,username: "<?php echo $_SESSION['username']; ?>"},
        	       success: function(data){
        	       	//alert(data);
        	    	   $('#games-container').html(data);
        	       }
        	   });
