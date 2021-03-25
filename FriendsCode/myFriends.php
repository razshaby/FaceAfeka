<?php
require_once('..\Functions\checkIfUser.php');
?>
    <link href="../CSS/MyFriends.css" rel='stylesheet' type='text/css' /> 
<script>  
     $(document).ready(function(){  

    	//Update the friends list under the id myFriends -R
    	<?php  
        include('..\FriendsCode\showMyFriends.php'); //The id myFriends must be exist -R
    	?>   

    	 $(document).on('click', '.myFriendsList', function(){  
	          
	        friendToShow = $(this).text();
	        <?php
              include('..\Functions\showPosts.php'); //The id myFriends must be exist -R
            ?>

	      }); 

    	 $( "#showAllPostsBtn" ).click(function() {
    		 friendToShow ="";
 	        <?php
               include('..\Functions\showPosts.php'); //The id myFriends must be exist -R
             ?>
    		});
    	      
     });  
</script>

	<button type="button" class="btn btn-outline-primary" id="showAllPostsBtn">Show All Posts</button>
	
   <div id="myFriends"></div>

 