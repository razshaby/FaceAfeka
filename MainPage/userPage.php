

<?php
session_start();
require_once('..\Functions\checkIfUser.php');
?>


<!-- Testing ONLY No actual Use -S  need to add Html Creator so that it can be all changed! -->
<html>
<head>
  <title>FACEAFEKA</title>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  


<!-- fancybox -->
           <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  
</head>
<!--CSS link! PageStyle.css  -S-->
 <link href="../CSS/PageStyle.css" rel='stylesheet' type='text/css' />
<body>

    <!--CSS link! PageStyle.css  -S-->
    <div class="header">
    
        <?php  if (isset($_SESSION['username'])) : ?>
             <div class="Welcome">
                Welcome <strong><?php echo $_SESSION['username']; ?></strong>                  
                   
                   <?php
                   require_once('..\Functions\getUserImage.php');
                   $img = getUserImage($_SESSION['username']);?>
    				
    				
    				
    				<a id="userImageProfileSmall_a" data-fancybox="myProfile_small" href="<?php echo $img ?>">
    				
    				<img class="small-profile-img" id="userImageProfileSmall" src="
    				
    				<?php echo $img ?>
    				
    				">
    				
    				
    				</a>
    
             </div>   	
        <?php endif ?>
      
        
        <div class="Logout">
         <a href="../MainPage/userPage.php?logout='1'">Logout</a> 
        </div>
        
        <div class="logoImg">
            	FACEAFEKA
        </div>
    </div>
    
    
    <div class="timeLine">
    
        <div class="left">
        	<?php
        	   require_once('..\FriendsCode\showUsers.php');
        	?>
        </div>
        <div class="middle">
            <?php
            require_once('..\PostCode\CreateNewPost.php');
            ?>
            <?php
            require_once('..\PostCode\Post.php');
            ?>

        </div>
        
        <div class="right">
        
        
    
        
          <?php
          require_once('userPanel.php');
        ?>
        
      
        </div>
    </div>

</body>
</html>