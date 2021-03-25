<?php
require_once ('..\Functions\checkIfUser.php');
?>
<link href="../CSS/games.css" rel='stylesheet' type='text/css' />



<script>  
     $(document).ready(function(){  
    	 $('#invite_friend_to_game_msg').hide();


    	 <?php  //include('demo.php'); ?>

    	 
		var action_selected;
		
    	 $("button").click(function(){
    		  $("button").removeClass("active_btn");
    		  $(this).addClass("active_btn");
    		  //alert($(this).html());
    		  action_selected=$(this).html();
    		   <?php  include('update_games-container_AJAX.php'); ?>
             
 	      }); 


    	 $(document).on('click', '.notInvitedFriendsList', function(){  
	          
                    		 var friendToInvite = $(this).text();
                  	  
                
                             <?php  include('inviteAFriend_AJAX.php'); ?>
                
                       
                            
                             <?php  include('update_games-container_AJAX.php'); ?>
                
                
                             $('#invite_friend_to_game_msg').fadeIn().html(friendToInvite + " invited");
                             setTimeout(function(){  
                                  $('#invite_friend_to_game_msg').fadeOut("Slow");  
                             }, 3000);          	
   			  });  


    	 $(document).on('click', '.InvitedFriendsList', function(){  
	          
                    		 var friendToCancleInvitation = $(this).text();
                  	  

                             //The var friendToCancleInvitation must be defined
                             <?php  include('cancelInviteAFriend_AJAX.php'); ?>
                
                       
                             action_selected="Invited";
                             <?php  include('update_games-container_AJAX.php'); ?>
                
                
                             $('#invite_friend_to_game_msg').fadeIn().html("Invitation to " + friendToCancleInvitation + " got canceled");
                             setTimeout(function(){  
                                  $('#invite_friend_to_game_msg').fadeOut("Slow");  
                             }, 3000);          	
    	 });  



		});
</script>


<?php

?>

<button type="button" class="btn btn-primary" id="Invite">Invite</button>
<button type="button" class="btn btn-primary" id="Invited">Invited</button>
<button type="button" class="btn btn-primary" id="Waiting">Waiting</button>


<div id="games-container"></div>
<div class="alert alert-success" role="alert" id="invite_friend_to_game_msg"></div><br>




