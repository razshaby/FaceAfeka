<?php
require_once('..\Functions\checkIfUser.php');
?>

<link href="../CSS/postCss.css" rel='stylesheet' type='text/css' /> 
<script>  
        // Function to Start's When Page Start's -S
         $(document).ready(function(){  
        
        	     //Update the posts under the post-container post -R

        	     	
        	       	<?php  
        	       	   include('../Functions/showPosts.php'); //The id post-container must be exist -R
        	       	?>

         });  

             // IMPORTANT! this Give the ID of each post when Done Click! Logic Creation! - S
         $(document).on('click', '.button-like', function(){  
       	  var id = this.id;
       	   $.ajax({
       	       type: "POST",
       	       url: '../PostCode/Like.php',
       	       data: {input: id,username: "<?php echo $_SESSION['username']; ?>"},
       	       success: function(data){
           	       //Update the Post's - S

       	       	<?php  
         	       	   include('..\Functions\showPosts.php'); //The id post-container must be exist -R
         	       	?>
       	       }
       	   });
         });  
                 /// its so we can check Liked Class ! - For Dislike - S
         $(document).on('click', '.liked', function(){  
       	  var id = this.id;

       	   $.ajax({
       	       type: "POST",
       	       url: '../PostCode/Like.php',
       	       data: {input: id,username: "<?php echo $_SESSION['username']; ?>"},
       	       success: function(data){
           	       //Update the Posts - S
        
       	       	<?php  
         	       	   include('..\Functions\showPosts.php'); //The id post-container must be exist -R
         	       	?>
       	       }
       	   });
         }); 

         // IMPORTANT! this Give the ID of each post when Done Click! Logic Creation! - S
         $(document).on('click', '.CommentButton', function(){  
          	  var id = this.id;
           	  var text = "text";
           	  var textID = text+id;
        	  var textSend = document.getElementById(textID).value;
          	   $.ajax({
           	       type: "POST",
           	       url: '../PostCode/Comment.php',
           	       data: {postID: id,username: "<?php echo $_SESSION['username']; ?>",text: textSend},
           	       success: function(data){
                       document.getElementById(textID).value = '';  
              	       //Update the Post's - S  
              	       	<?php  
                  	       	   include('..\Functions\showPosts.php'); //The id post-container must be exist -R
                  	       	?>
           	       }
           	   });
             });  

         $(document).on('change ', '.PrivecyOption', function(){  
         	  var id = this.id;
         	 var e = document.getElementById(id);
         	 var strUser = e.options[e.selectedIndex].text;
         	   $.ajax({
          	       type: "POST",
          	       url: '../PostCode/Privacy.php',
          	       data: {postID: id,username: "<?php echo $_SESSION['username']; ?>",privacy: strUser},
          	       success: function(data){
             	       //Update the Post's - S  
             	       	<?php  
                 	       	   include('..\Functions\showPosts.php'); //The id post-container must be exist -R
                 	       	?>
          	       }
          	   });
            });  

        // 
 </script>
<!--ALL post Container, Small And Easy it's the Div Post that go's in middle have a Container!-S-->
<div id="post-container" class="PostContainer">
</div> 
