<?php
$db = mysqli_connect('localhost', 'root', '', 'wad');

if (isset($_POST['edit_table'])) {
    $club = $_POST['club'];
    $result = $_POST['result'];
    $goalDifference = $_POST['goalDifference'];

    $pointsQuery = "SELECT points FROM standings WHERE team_id='$club'";
    $gamesPlayedQuery = "SELECT games_played FROM standings WHERE team_id='$club'";

    $currPointsArr = mysqli_query($db, $pointsQuery);
    $currPointsArr = $currPointsArr->fetch_array();
    $currPoints = intval($currPointsArr[0]);

    $currGamesPlayedArr = mysqli_query($db, $gamesPlayedQuery);
    $currGamesPlayedArr = $currGamesPlayedArr->fetch_array();
    $currGamesPlayed = intval($currGamesPlayedArr[0]);

    $newPoints = $currPoints + $result;
    $newGamesPlayed = $currGamesPlayed + 1;

    $insertPointsQuery = "UPDATE standings SET points='$newPoints' WHERE team_id='$club'";
    $insertGamesQuery = "UPDATE standings SET games_played='$newGamesPlayed' WHERE team_id='$club'";

    $updatePts = mysqli_query($db, $insertPointsQuery);
    if($result == 0)
    {
        $updateGms = mysqli_query($db, $insertGamesQuery);
        $lossQuery = "UPDATE standings set loss=loss+1 where team_id='$club'";
        $updateLoss = mysqli_query($db, $lossQuery);
        $differenceQuery = "UPDATE standings set goal_difference=goal_difference - $goalDifference where team_id='$club'";
        $updateDifference = mysqli_query($db, $differenceQuery);
    }
    else if($result==3)
    {
        $updateGms = mysqli_query($db, $insertGamesQuery);
        $winsQuery = "UPDATE standings set wins=wins+1 where team_id='$club'";
        $updateWins = mysqli_query($db, $winsQuery);
        $differenceQuery = "UPDATE standings set goal_difference=goal_difference + $goalDifference where team_id='$club'";
        $updateDifference = mysqli_query($db, $differenceQuery);
    }
    else if($result==1)
    {
        $updateGms = mysqli_query($db, $insertGamesQuery);
        $drawsQuery = "UPDATE standings set draws=draws+1 where team_id='$club'";
        $updateDraws = mysqli_query($db, $drawsQuery);
    }

    header('location: statedit.php');
}
