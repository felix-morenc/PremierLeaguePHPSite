<?php
$db = mysqli_connect('localhost', 'root', '', 'wad');

if (isset($_POST['edit_stat'])) {
    $pname = $_POST['pname'];
    $club = $_POST['club'];
    $goals = $_POST['goals'];
    $assists = $_POST['assists'];

    $playercheck = "SELECT * FROM player_stats WHERE pname='$pname'";
    $result = mysqli_query($db, $playercheck);
    if (mysqli_num_rows($result) == 1) {
        $goalQuery = "SELECT goals FROM player_stats WHERE pname='$pname'";
        $assistsQuery = "SELECT assists FROM player_stats WHERE pname='$pname'";

        $currGoalsArr = mysqli_query($db, $goalQuery);
        $currGoalsArr = $currGoalsArr->fetch_array();
        $currGoals = intval($currGoalsArr[0]);

        $currAssistsArr = mysqli_query($db, $assistsQuery);
        $currAssistsArr = $currAssistsArr->fetch_array();
        $currAssists = intval($currAssistsArr[0]);

        $newGoals = $currGoals + $goals;
        $newAssists = $currAssists + $assists;

        $insertGoalsQuery = "UPDATE player_stats SET goals='$newGoals' WHERE pname='$pname'";
        $insertAssistsQuery = "UPDATE player_stats SET assists='$newAssists' WHERE pname='$pname'";
        
        $updateGls = mysqli_query($db, $insertGoalsQuery);
        $updateAss = mysqli_query($db, $insertAssistsQuery);
        header('location: statedit.php');
    }
    else
    {
        $insertPlayerQuery = "INSERT INTO player_stats (pname, club, goals, assists) VALUES ('$pname', '$club', '$goals', $assists)";
        $insertPlayer = mysqli_query($db, $insertPlayerQuery);
        header('location: statedit.php');

    }

}
