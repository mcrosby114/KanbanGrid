<?php
	//Redirect if not logged in
  if(!isset($_SESSION)) session_start();
  if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"])) {
    header("Location: login.php");
    die;
  }
?>
