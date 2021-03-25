<?php
require_once('..\Functions\checkIfUser.php');
?>

<link href="../CSS/showUsers.css" rel='stylesheet' type='text/css' /> 
           <script>  
    	       $(document).ready(function(){  
    	    	      $('#friend').keyup(function(){  
    	    	           var query = $(this).val();  
    	    	           if(query != '')  
    	    	           {   
    	    	        	   $.ajax({
    	    	        	       type: "POST",
    	    	        	       url: '../FriendsCode/showUsers_code.php',
    	    	        	       data: {input: query,username: "<?php echo $_SESSION['username']; ?>"},
    	    	        	       success: function(data){
    	    	        	    	   $('#friendList').fadeIn();  
    	    	                       $('#friendList').html(data);
    	    	        	       }
    	    	        	   });
    	    	           }  
    	    	           else
    	    	           {
    	    	        	   $('#friendList').fadeOut();
    	    	           }           
    	    	      });  


    	    	      
    	    	      
    	    	      $(document).on('click', '.canAdded', function(){  
    	    	          
    	    	          if($(this).text() != "friend Not Found!")
    	    	          {
    	    	           $('#friendList').fadeOut();


    	    	           $.ajax({
    	    	    	       type: "POST",
    	    	    	       url: '../FriendsCode/addFriend.php',
    	    	    	       data: {username: "<?php echo $_SESSION['username']; ?>",friend:$(this).text() },
    	    	    	       success: function(data){
    	    	                   if(data != "")
    	    	                   {

    	    	         	    	  $('#msg').fadeIn().html(data.concat(" added succesfuly"));
    	    	                       setTimeout(function(){  
    	    	                            $('#msg').fadeOut("Slow");  
    	    	                       }, 2000); 
    	    	                       $('#friend').val('');
    	    	                   }
    	    	    	       }
    	    	    	   });

    	    	           //Set focus on the text box 
    	    	           $( "#friend" ).focus();

    	    	           
    	    	         //Update the friends list under the id myFriends -R
    	    	       	<?php  
    	    	           include('showMyFriends.php'); //The id myFriends must be exist -R
    	    	       	?>


    	    	        //Update the posts under the id post -R
    	    	       	<?php  
    	    	           include('..\Functions\showPosts.php'); //The id post must be exist -R
    	    	       	?>

   	    	           //If action_selected not defined the defualt is Invite -R
    	                <?php  include('..\gameCode\update_games-container_AJAX.php'); ?>


   	            	   
    	    	          }  
    	    	      });  
    	    	 });  
 </script>
<div class="ShowUsers">

    <input type="text" name="friend" id="friend"  placeholder="Add Friends" autocomplete="off"  style="border-radius: 5px; font-size:30px;" />
     <div><label id="msg"></label></div>  
    
    
    <div id="friendList"></div>  
   
</div>  

 