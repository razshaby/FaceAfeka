
<?php
session_start();
?>


<html>
<head>

</head>
<!--CSS link! loginStyle.css  -S-->
<link href="CSS/loginStyle.css" rel='stylesheet' type='text/css' />
<body>
	<!--This is the Form to Start Entering The WebSite ! Send's this Form to login_code.php from there Handling -S-->
	<form action="Login\login_code.php" method="POST">
    		<!--Title  -S-->
    		<div>
    		<img src="images/logo.png">
            </div>
    		<!--Input UserName  -S-->
    		<div>
    			<input type="text" name="username" placeholder="Username" required /><br>
    		</div>
    		<!--Input Password  -S-->
    		<div>
    			<input type="password" name="password" placeholder="Password"
    				required />
    		</div>
    		<!--THe Submit Function Run here.  -S-->
    		<div class="submit">
    			<input id="login" type="submit" name="login_user" value="Login">
    		</div>
    
    	   <!--Box For SignUp  -S-->
    
    		<div class="signup">
    			Not registered yet?<br>
    			<!--Referance SignUp page!  -S-->
    			<a href="Login/SignUp.php" style="color:blue; font-size: 25px;">Sign up</a><br> Talk with Friend's For Free
    		</div>
                  <?php
                if (isset($_SESSION['Wrong Password'])) {
                    echo "</br><span id=\"errorLabel\" style=\"color:red; font-size: 25px; font-family: 'Comic Sans MS', sans-serif;\">" . $_SESSION['Wrong Password'] . "</span>";
                }
                unset($_SESSION['Wrong Password']);
                ?>

	</form>




</body>
</html>