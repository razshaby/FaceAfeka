<script>
$(document).ready(function (e) {
	 $('#upload_post_msg').hide();
	 $('#upload_post_error_msg').hide();
	$("#form").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "../PostCode/createNewPost_code.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				//$("#preview").fadeOut();
				$("#upload_post_error_msg").fadeOut();
			},
			success: function(data)
		    {

				if(data=="successfuly")
				{
					$("#form")[0].reset();						
					
					  $('#upload_post_msg').fadeIn().html("The post successfuly added");
                      setTimeout(function(){  
                           $('#upload_post_msg').fadeOut("Slow");  
                      }, 2000); 
					
                      //Update the posts under the id post -R
                      <?php  $_SESSION['friendToShow']="";?>
  	    	       	<?php  
  	    	           include('..\Functions\showPosts.php'); //The id post must be exist -R
  	    	       	?>
				}
				else
				{
					$("#upload_post_error_msg").fadeIn().html(data);
					 setTimeout(function(){  
                        $('#upload_post_error_msg').fadeOut("Slow");  
                   }, 2000); 
				}
			    
// 				//alert("success");
// 				if(data=='invalid')
// 				{
// 					// invalid file format.
// 					$("#upload_post_error_msg").html("Invalid File !").fadeIn();
// 				}
// 				else
// 				{
// 					if(data =="Status Text is Empty")
// 					{
// 						$("#upload_post_error_msg").fadeIn().html(data);
// 						 setTimeout(function(){  
//                              $('#upload_post_error_msg').fadeOut("Slow");  
//                         }, 2000); 
// 					}
// 					else
// 					{
    					
//     					$("#form")[0].reset();	
//     					//$("#msg").html(data).fadeIn();
    					
    					
//     					  $('#upload_post_msg').fadeIn().html(data);
//                           setTimeout(function(){  
//                                $('#upload_post_msg').fadeOut("Slow");  
//                           }, 2000); 
    					
//                           //Update the posts under the id post -R
      	    	       	<?php  
//       	    	           include('AJAX\showPosts.php'); //The id post must be exist -R
//       	    	       	?>
// 					}
// 				}
				
		    },
		  	error: function(e) 
	    	{
				$("#upload_post_error_msg").html(e).fadeIn();
	    	} 	        
	   });
	}));
});
</script>
