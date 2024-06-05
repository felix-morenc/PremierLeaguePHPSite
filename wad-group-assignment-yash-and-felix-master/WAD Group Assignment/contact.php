<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prem Stat Tracker</title>
  <link  rel="stylesheet" type="text/css" href="CSS/design.css">
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
      <a href="fixturesandresults.php">Fixtures/Results</a>
      <a class="active" href="contact.php">Contact</a>
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
  
  <br>
  <h3>Contact Form</h3>
  <br>

    <form action="/action_page.php">
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name.." class = "contactinput">
      <br>
      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name.." class = "contactinput">
      <br>
      <label for="country">Country</label>
      <select id="country" name="country" class = "contactinput">
        <option value="australia">Australia</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
      </select>
      <br>
      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" class = "contactinput"></textarea>
      <br>

      <input type="submit" value="Submit">
    </form>
  </div>
</body>
<br>
<div class="footer">  <!-- Declared footer -->
  <!-- Footer Starts -->
  <footer align="center"><p>Felix & Yash</p>
  </footer>
  <!-- Footer Ends -->
</div>
</html>