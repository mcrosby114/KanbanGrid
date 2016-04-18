<?php
  if(!isset($_SESSION)) session_start();
  if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"])) {
    header("Location: login.php");
    die;
  }
  session_destroy();
  session_regenerate_id(TRUE);
  header("Location: login.php");
?>
