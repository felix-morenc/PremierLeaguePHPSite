<?php
include "dbconnect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prem Stat Tracker</title>
	<script src='jquery-3.3.1.min.js' type='text/javascript'></script>
	<script src='statscript.js' type='text/javascript'></script>
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
			<a class="active" href="stats.php">Statistics</a>
			<a href="standings.php">Standings</a>
			<a href="fixturesandresults.php">Fixtures/Results</a>
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
		<div class="row">
			<div class="col3">
				<input type="text" placeholder="Search..">
				<button type="submit">Search Player</button>
			</div>
			<div class="col9">
				<div class="stat">
					<input type='hidden' id='sort' value='asc'>
					<table id='playerstats'>
						<tr>
							<th onclick='sortTbl("pname");'>Player Name</th>
							<th onclick='sortTbl("club");'>Club</th>
							<th onclick='sortTbl("goals");'>Goals</th>
							<th onclick='sortTbl("assists");'>Assists</th>
						</tr>
						<?php
						$query = "SELECT * FROM player_stats ORDER BY goals DESC";
						$result = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($result)) {
							$player = $row['pname'];
							$club = $row['club'];
							$goals = $row['goals'];
							$assists = $row['assists'];

						?>
							<tr>
								<td><?php echo $player; ?></td>
								<td><?php echo $club; ?></td>
								<td><?php echo $goals; ?></td>
								<td><?php echo $assists; ?></td>
							</tr>
						<?php
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
	
</body>
<br>
<div class="footer">	<!-- Declared footer -->
	<!-- Footer Starts -->
	<footer align="center"><p>Felix & Yash</p>
	</footer>
	<!-- Footer Ends -->
</div>
</html>