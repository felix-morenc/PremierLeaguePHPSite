<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prem Stat Tracker</title>
	<link  rel="stylesheet" type="text/css" href="CSS/design.css">
	<script type="text/javascript">
		function validateform(form)
		{
			if(form.username.value == "")
			{
				alert("Must Select Username!");
				form.username.focus();
				return false;
			}
			if(form.password.value == "" || form.password2.value == "")
			{
				alert("Please fill in both password fields");
				form.password.focus();
				return false;
			}

			if(form.password.value == form.username.value)
			{
				alert("Password can not be the same as username")
				form.username.focus();
				return false;
			}
			if(form.password.value !== form.password2.value)
			{
				alert("Passwords do not match!");
				form.password.focus();
				return false;
			}
		}





	</script>
</head>
<header>
	<h1 align="center">Premier League Stats 2019/2020</h1>
</header>
<body>
	<br>
	<div class = "container">
		<div class="navbar">
			<a href="index.php">Home</a>
			<a href="stats.php">Statistics</a>
			<a href="standings.php">Standings</a>
			<a href="fixturesandresults.php">Fixtures/Results</a>
			<a href="contact.php">Contact</a>
			<a class="active" href="register.php">Register</a>
		</div>
	</div>

	<br>
	<h3>Login</h3>
	<br>
	<form method="post" action="register.php" onsubmit="return validateform(this);">
		<?php include('errors.php'); ?>	
		<label>Username</label>
		<input type="text" name="username" class="inputlog" >
		<br>
		<label>Password</label>
		<input type="password" name="password" class= "inputlog">
		<br>		  	
		<button type="submit" class="btn" name="login_user">Login</button>	
		<br>  	
	</form>
	<br>
	<br>

	<h3>Register</h3>
	<br>
	<form method="post" action="register.php" onsubmit="return validateform(this);">
		<?php include('errors.php'); ?>		  	
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>" class = "inputlog">
		<br>
		<label>Password</label>
		<input type="password" name="password" class = "inputlog">
		<br>
		<label>Confirm Password</label>
		<input type="password" name="password2">
		<br>	  	
		<button type="submit" class="btn" name="reg_user" class = "inputlog">Register</button>
		<br>	  	
	</form>
	<br>
	<br>

</body>
<div class="footer">	<!-- Declared footer -->
	<!-- Footer Starts -->
	<footer align="center"><p>Felix & Yash</p>
	</footer>
	<!-- Footer Ends -->
</div>
</html>