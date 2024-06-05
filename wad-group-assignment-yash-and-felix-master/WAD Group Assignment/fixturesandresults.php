<?php
session_start();
include "dbconnect.php";
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prem Stat Tracker</title>
	<link rel="stylesheet" type="text/css" href="CSS/design.css">
</head>
<header>
	<h1 align="center">Premier League Stats 2019/2020</h1>
</header>

<body>
	<br>
	<div class="container">
		<div class="navbar">
			<a href="index.php">Home</a>
			<a href="stats.php">Statistics</a>
			<a href="standings.php">Standings</a>
			<a class="active" href="fixturesandresults.php">Fixtures/Results</a>
			<a href="contact.php">Contact</a>
			<?php
			if (!isset($_SESSION['username'])) {
				echo "<a href=" . "register.php" . ">Register</a>";
			} else {
				echo "<a href=" . "logout.php" . ">Log Out</a>";
				echo "<a href=" . "statedit.php" . ">Edit Stats</a>";
			}
			?>
		</div>
	</div>

	<br>
	<br>

	<h1 class="headin">Fixtures/Results</h1>

	<h2 align="left" class="fixhead">Upcoming Fixtures</h2>

	<div class="fixtures">
		<?php
		$query = "SELECT * FROM fixtures ORDER BY fixture_id DESC";
		$result = mysqli_query($con, $query);
		while ($row = mysqli_fetch_array($result)) {
			$hTeam = $row['home_team'];
			$aTeam = $row['away_team'];

		?>
			<div class="fixture">
				<div class="homeTeam"><?php echo $hTeam; ?></div>
				<div class="awayTeam"><?php echo $aTeam; ?></div>
			</div>
		<?php
		}
		?>

	</div>

	<br>
	<br>
	</div>
</body>
<div class="footer">
	<!-- Declared footer -->
	<!-- Footer Starts -->
	<footer align="center">
		<p>Felix & Yash</p>
	</footer>
	<!-- Footer Ends -->
</div>

</html>