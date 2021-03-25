<?php include('SignUp_Code.php') ?>
<html>
<head>

	<title>Sign Up</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
</head>
<!--CSS link!   -S-->
 <link href="../CSS/signUpStyle.css" rel='stylesheet' type='text/css' />

<body>




	<div class="container">


		<form action="SignUp.php" method="post">
			
			
						<h2>Sign Up</h2>
			
			<table style="width:100%">
			
			
			<tr>
				 <th><label for="username">Username : </label> </th>
				 <th><input type="text" name="username" maxlength="20" required> </th>
			
			</tr>

			<tr>
				<th><label for="password">Password : </label></th>
				<th><input type="password" name="password_1" maxlength="20" required></th>
			</tr>


			<tr>
			  	<th><label for="password">Confirm Password : </label></th>
				<th><input type="password" name="password_2" maxlength="20" required></th>
			</tr>


</table>			
			<button id="signUp" type="submit" name="reg_user"> Submit </button>
			
						  	<?php include('..\Functions\errors.php'); ?>
			<p> Already a user <a href="../index.php"><b>Log in</b></a> </p>
			
		</form>




	</div>

</body>
</html>