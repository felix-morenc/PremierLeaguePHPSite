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
	<script src='jquery-3.3.1.min.js' type='text/javascript'></script>
	<script src='standingsscript.js' type='text/javascript'></script>
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
			<a class="active" href="standings.php">Standings</a>
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
		<div class="ptable">
			<h1 class="headin">Standings</h1>
			<input type='hidden' id='sort' value='asc'>
			<table id='standings'>
				<tr class="wpos">
					<th>Pos</th>
					<th onclick='sortTbl("team");'>Team</th>
					<th onclick='sortTbl("games_played");'>GP</th>
					<th onclick='sortTbl("wins");'>W</th>
					<th onclick='sortTbl("draws");'>D</th>
					<th onclick='sortTbl("losses");'>L</th>
					<th onclick='sortTbl("goal_difference");'>GD</th>
					<th onclick='sortTbl("points");'>PTS</th>
				</tr>


				<?php
				$query = "SELECT * FROM standings ORDER BY points DESC";
				$result = mysqli_query($con, $query);
				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
					$team = $row['team'];
					$gamesPlayed = $row['games_played'];
					$wins = $row['wins'];
					$draws = $row['draws'];
					$losses = $row['losses'];
					$goalDiff = $row['goal_difference'];
					$points = $row['points'];
					$i++;
					if($i < 5) {

				?>	
					<tr class="wpos">
						<td><?php echo $i; ?></td>
						<td><?php echo $team; ?></td>
						<td><?php echo $gamesPlayed; ?></td>
						<td><?php echo $wins; ?></td>
						<td><?php echo $draws; ?></td>
						<td><?php echo $losses; ?></td>
						<td><?php echo $goalDiff; ?></td>
						<td><?php echo $points; ?></td>
					</tr>
				<?php
				}
				else{
				?>
					<tr class="pos">
						<td><?php echo $i; ?></td>
						<td><?php echo $team; ?></td>
						<td><?php echo $gamesPlayed; ?></td>
						<td><?php echo $wins; ?></td>
						<td><?php echo $draws; ?></td>
						<td><?php echo $losses; ?></td>
						<td><?php echo $goalDiff; ?></td>
						<td><?php echo $points; ?></td>
					</tr>

				<?php
				}
				}
				?>
			</table>
		</div>
	</div>
</body>
<div class="footer">	<!-- Declared footer -->
	<!-- Footer Starts -->
	<footer align="center"><p>Felix & Yash</p>
	</footer>
	<!-- Footer Ends -->
</div>
</html>