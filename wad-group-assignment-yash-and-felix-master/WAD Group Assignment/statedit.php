<?php 
session_start();
include('dbstatedit.php');
include('dbtableedit.php');
?>
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
	<div class="navbar">
		<a class="active" href="index.php">Home</a>
		<a href="stats.php">Statistics</a>
		<a href="standings.php">Standings</a>
		<a href="fixturesandresults.php">Fixtures/Results</a>
		<a href="contact.php">Contact</a>
		<?php
		if (!isset($_SESSION['username']))
		{
			echo "<a href=" . "register.php" . ">Register</a>";
		}
		else
		{
			echo "<a href=" . "logout.php" . ">Log Out</a>";
			echo "<a href=" . "statedit.php" . ">Edit Stats</a>";
		}
		?>
	</div>
	<?php
	if ($_SESSION['usertype'] != 0)
	{
		echo "<p>You do not have administrator access, therefore you are unable to edit stats<p>";
	}
	else
	{
		echo "<p>Welcome Admin!<p>";
		echo '<div class="container">
		<form method="post" action="statedit.php" onsubmit="return validateform(this);">
		<label for="pname">Full Name</label>
		<input type="text" id="pname" name="pname" placeholder="Your name.." class = "contactinput">
		<br>
		<label for="club">Club</label>
		<select id="club" name="club" class = "contactinput">
		<option value="Bournemouth">AFC Bournemouth</option>
		<option value="Arsenal">Arsenal</option>
		<option value="AstonVilla">Aston Villa</option>
		<option value="Brighton">Brighton</option>
		<option value="Burnley">Burnley</option>
		<option value="Chelsea">Chelsea</option>
		<option value="Palace">Crystal Palace</option>
		<option value="Everton">Everton</option>
		<option value="Leicester">Leicester City</option>
		<option value="Liverpool">Liverpool FC</option>
		<option value="ManchesterC">Manchester City</option>
		<option value="ManchesterU">Manchester United</option>
		<option value="Newcastle">Newcastle United</option>
		<option value="Norwich">Norwich</option>
		<option value="Sheffield">Sheffield United</option>
		<option value="Southampton">Southampton</option>
		<option value="Tottenham">Tottenham</option>
		<option value="Watford">Watford</option>
		<option value="WestHam">West Ham United</option>
		<option value="Wolverhampton">Wolverhampton Wanderers</option>
		</select>
		<br>
		<label for="goals">Goals To Add</label>
		<input type="text" id="goals" name="goals" placeholder="0" class = "contactinput">
		<br>
		<label for="assists">Assists:</label>
		<input type="text" id="assists" name="assists" placeholder="0" class = "contactinput">
		<br>
		<br>
		<button type="submit" class="btn" name="edit_stat">Add/Edit</button>
		</form>
		</div>
		
		<div class="container">
		<form method="post" action="dbtableedit.php" onsubmit="return validateform(this);">
		<label for="club">Club</label>
		<select id="club" name="club" class = "contactinput">
		<option value="18">AFC Bournemouth</option>
		<option value="9">Arsenal</option>
		<option value="19">Aston Villa</option>
		<option value="15">Brighton</option>
		<option value="10">Burnley</option>
		<option value="4">Chelsea</option>
		<option value="11">Crystal Palace</option>
		<option value="12">Everton</option>
		<option value="3">Leicester City</option>
		<option value="1">Liverpool FC</option>
		<option value="2">Manchester City</option>
		<option value="5">Manchester United</option>
		<option value="13">Newcastle United</option>
		<option value="20">Norwich</option>
		<option value="7">Sheffield United</option>
		<option value="14">Southampton</option>
		<option value="8">Tottenham</option>
		<option value="17">Watford</option>
		<option value="16">West Ham United</option>
		<option value="6">Wolverhampton Wanderers</option>
		</select>
		<br>
		<label for="result">Result</label>
		<select id="result" name="result" class = "contactinput">
		<option value="3">Win</option>
		<option value="1">Draw</option>
		<option value="0">Loss</option>
		</select>
		<br>
		<label for="goalDifference">Change in Goal Difference:</label>
		<input type="text" id="goalDifference" name="goalDifference" placeholder="0" class = "contactinput">
		<br>
		<br>
		<button type="submit" class="btn" name="edit_table">Add Result</button>
		</form>
		</div>
		';
	}

	?>


	<div class="footer">	<!-- Declared footer -->
		<!-- Footer Starts -->
		<footer align="center"><p>Felix & Yash</p>
		</footer>
		<!-- Footer Ends -->
	</div>
</body>
</html>