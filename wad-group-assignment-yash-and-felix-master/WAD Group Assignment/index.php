<?php 
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'wad';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$goals = '';
	$assists = '';

	//query to get data from the table
	$sql = "SELECT * FROM `player_stats` ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$goals = $goals . '"'. $row['goals'] .'",';
		$assists = $assists . '"'. $row['assists'].'",';
	}

	$goals = trim($goals,",");
	$assists = trim($assists,",");
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
	<title>Prem Stat Tracker</title>
	<link  rel="stylesheet" type="text/css" href="CSS/design.css">
</head>
<header>
	<h1 align="center">Premier League Stats 2019/2020</h1>
</header>
<body>
	<br>
	<div class = "indexcontainer">
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
	</div>
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<?php endif ?>

	<br>
	<h2>Home</h2>
	<br>
	<br>
	<h3>Latest News</h3>
	<br>

	<ul class="list img-list">
	  <li>
	      <div class="li-img">
	        <img src="https://e1.365dm.com/19/10/768x432/skysports-manchester-united_4808486.jpg?20191018122114" width="700" height="330" alt="mufcvsliverpool" />
	      </div>
	      <div class="li-text">
	        <h3 class="li-head">The Big Battle</h3>
	        <div class="li-sub">
	          <p>This Sunday is the massive clash between Manchester United and Liverpool. If Liverpool win, they take the lead, but if Manchester United win, they can get a Champions League spot.</p>
	        </div>
	      </div>
	  </li>
	  <br>
	  <li>
	      <div class="li-img">
	        <img src="https://media.gq-magazine.co.uk/photos/5d358c9913acec000813f097/16:9/w_1920,c_limit/20190719-Premier-League-Kit-21_b.jpg" width="700" height="330" alt="2019/2020PremierLeagueKits" />
	      </div>
	      <div class="li-text">
	        <h3 class="li-head">Best Premier League Kits of the 2019/2020 season</h3>
	        <div class="li-sub">
	          <p>We rank every Premier League team's kits based off of your votes. Who has the best kit of this season? Find out here.</p>
	        </div>
	      </div>
	  </li>
	  <br>
	  <li>
	      <div class="li-img">
	        <img src="https://static.standard.co.uk/s3fs-public/thumbnails/image/2019/08/08/16/premier-league-trophy.jpg" width="700" height="330" alt="premierleaguetrophy" />
	      </div>
	      <div class="li-text">
	        <h3 class="li-head">Who will be this years Premier League Champion?</h3>
	        <div class="li-sub">
	          <p>We run down each Premier League team and see who is most likely to win the league, achieve Champions League and Europa League spots and who will get relegates.</p>
	        </div>
	      </div>
	  </li>
	</ul>
	<br>
	<br>
	<div class="container1">	
	    <h3>Top Scorers Graphic</h3>       
			<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'horizontalBar',
		        data: {
		            labels: ["Vardy","Aubameyang","Agüero","Salah","Ings","Mane","Rashford","Abraham","Calvert-Lewin","Jiménez"],
		            datasets: 
		            [{
		                label: 'Goals',
		                data: [<?php echo $goals; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 2
		             },

		            {
		            	label: 'Assists',
		                data: [<?php echo $assists; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(0,255,255)',
		                borderWidth: 2	
		            }]
		        	  },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        		}
		    	});
			</script>
	</div>
	<br>
	
</body>
<div class="footer">	<!-- Declared footer -->
	<!-- Footer Starts -->
	<footer align="center"><p>Felix & Yash</p>
	</footer>
	<!-- Footer Ends -->
</div>
</html>