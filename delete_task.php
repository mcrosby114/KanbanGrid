<?php
if(!isset($_SESSION)) session_start();
require_once ("dao.php");

  try {
    $dao = new Dao();
    $dao->deleteTask($_GET["task_id"]);
    header("Location: grid.php");
    die;
  } catch(Exception $e) {
    var_dump($e);
    echo "I'm a dumb dumb.";
    die;
  }
?>
