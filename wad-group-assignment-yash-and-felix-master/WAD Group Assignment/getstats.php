<?php

include "dbconnect.php";

$columnName = $_POST['columnName'];
$sort = $_POST['sort'];

$select_query = "SELECT * FROM player_stats ORDER BY " . $columnName . " " . $sort . " ";

$result = mysqli_query($con, $select_query);

$html = '';
while ($row = mysqli_fetch_array($result)) {
    $player = $row['pname'];
    $club = $row['club'];
    $goals = $row['goals'];
    $assists = $row['assists'];

    $html .= "<tr>
    <td>".$player."</td>
    <td>".$club."</td>
    <td>".$goals."</td>
    <td>".$assists."</td>
    </tr>";
}

echo $html;
