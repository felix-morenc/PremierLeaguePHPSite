<?php
session_start();

$username = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'wad');

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $usercheck = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $usercheck);
  $user = mysqli_fetch_assoc($result);  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username in use! Select a different one!");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $create = "INSERT INTO users (username, password, usertype) 
    VALUES('$username', '$password', 1)";
    mysqli_query($db, $create);
    $_SESSION['username'] = $username;
    $_SESSION['usertype'] = 1;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (count($errors) == 0) {
    $password = md5($password);
    $checkquery = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $checkquery);
    if (mysqli_num_rows($results) == 1) {
      $typequery = "SELECT usertype FROM users WHERE username='$username'";
      $type = mysqli_query($db, $typequery);
      $type = $type->fetch_array();
      $usertype = intval($type[0]);
      $_SESSION['usertype'] = $usertype;
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Logged in!";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong Pass Or Username!");
    }
  }
}

?>
