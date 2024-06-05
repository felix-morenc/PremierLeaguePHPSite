<?php

include "dbconnect.php";

$columnName = $_POST['columnName'];
$sort = $_POST['sort'];

$select_query = "SELECT * FROM standings ORDER BY " . $columnName . " " . $sort . " ";

$result = mysqli_query($con, $select_query);

$html = '';
$i = 0;
while ($row = mysqli_fetch_array($result)) {
    $i++;
    $team = $row['team'];
    $gamesPlayed = $row['games_played'];
    $wins = $row['wins'];
    $draws = $row['draws'];
    $losses = $row['losses'];
    $goalDiff = $row['goal_difference'];
    $points = $row['points'];

    if($i < 5)
    {
        $html .= "<tr class='wpos'>
        <td>".$i."</td>
        <td>".$team."</td>
        <td>".$gamesPlayed."</td>
        <td>".$wins."</td>
        <td>".$draws."</td>
        <td>".$losses."</td>
        <td>".$goalDiff."</td>
        <td>".$points."</td>
        </tr>";
    }
    else
    {
        $html .= "<tr class='pos'>
        <td>".$i."</td>
        <td>".$team."</td>
        <td>".$gamesPlayed."</td>
        <td>".$wins."</td>
        <td>".$draws."</td>
        <td>".$losses."</td>
        <td>".$goalDiff."</td>
        <td>".$points."</td>
        </tr>";
    }
}

echo $html;