<?php
if(!isset($_SESSION)) session_start();
require_once ("dao.php");
$user_id = $_SESSION["userid"];

// $dao->addProject(1,"Test Title", $_SESSION["userid"], "Here's a dummy description.", "2016-04-30", "blue");
// $nextRow = $dao->getRowCount($user_id);
// $dao->addProject($nextRow,"Resolve Conflict with Chief Irving", $user_id, "This may take awhile.", "2016-07-15", "green");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST["Button_Pressed"])) {
  try {
    $t_column = intval($_POST["dayPicker"]);
    $t_title = test_input($_POST["t_title"]);
    $proj_id = intval($_POST["proj_id"]);
    $t_descrip = test_input($_POST["t_descrip"]);
    $t_date = ($_POST["t_due"]);
    if($t_date == ""){
      $t_date = NULL;
    }
    $t_color = $_POST["colorPicker"];
    // $t_column = 3;
    // $t_title = "TITLE TEST";
    // $user_id = 10;
    // $proj_id = 2;
    // $t_descrip = "DESCRIP TEST";
    // $t_date = "2016-02-01";
    // $t_color = "Red";
    $dao = new Dao();

    $dao->addTask($t_column, $t_title, $user_id, $proj_id, $t_descrip, $t_date, $t_color);

    header("Location: grid.php");
    die;
  } catch(Exception $e) {
    var_dump($e);
    echo "I'm a dumb dumb.";
    die;
  }
}
?>
