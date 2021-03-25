<?php
require_once('..\Functions\checkIfUser.php');

?>

<link href="../CSS/userPanel.css" rel='stylesheet' type='text/css' /> 


<script>
$(document).ready(function(){
	  $("#myProfile-container-max").hide();
	  $("#playAGame-container").hide();


  $(document).on('change', '.form-control', function(){  
	  var choice = $( "#sel1" ).val();

	  switch(choice) {
	  case "My friends":
	  	  showOrHide(true,"#myFriends-container",false,"#myProfile-container-max",false,"#playAGame-container");
	  	  showAllPosts();
	  	  break;
	  case "My Profile":
	  		  showOrHide(false,"#myFriends-container",true,"#myProfile-container-max",false,"#playAGame-container");
	  		  showMyPosts();  
	  	  break;
	  case "Play a Game":
	  	showOrHide(false,"#myFriends-container",false,"#myProfile-container-max",true,"#playAGame-container");
	    break;
	  }
    });



  
});

function showOrHide() {
   
    for (var i=0; i < arguments.length; i++) {
        if(arguments[i++])
        	$(arguments[i]).show();
        else
        	$(arguments[i]).hide();
    }
}


function showMyPosts()
{

  		//document.cookie='friendToShow='+'<?php echo $_SESSION['username']; ?>'; 
        <?php $_SESSION['friendToShow']=$_SESSION['username'];?>        
        delete friendToShow;
        
        <?php
          include('..\Functions\showPosts.php'); //The id myFriends must be exist -R
        ?>

}


function showAllPosts()
{
	  <?php $_SESSION['friendToShow']="";?>
      delete friendToShow;
<?php
  include('..\Functions\showPosts.php'); //The id myFriends must be exist -R
?>

}

</script>

<div class="UserPanel">

            
            <select class="form-control" id="sel1" name="sellist1">
                <option>My friends</option>
                <option>My Profile</option>
                <option>Play a Game</option>
              </select>
      
    <div id="myFriends-container">
    <?php
    require_once('..\FriendsCode\myFriends.php');
    ?>
    </div>
    
    
        <div id="myProfile-container-max">
        <?php
    require_once('..\MyProfileCode\myProfile.php');
    ?>
    </div>


   <div id="playAGame-container">
        <?php
    require_once('..\gameCode\games.php');
    ?>
    </div>


</div>