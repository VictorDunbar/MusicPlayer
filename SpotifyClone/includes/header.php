<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");

//session_destroy(); LOGOUT manually.

if(isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
  header("Location: register.php");

}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Spotify App Clone!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>

  <body>

    <div id="mainContainer">

      <div id="topContainer">

        <?php include("includes/navBarContainer.php"); ?>

        <div id="mainViewContainer">

          <div id="mainContent">
