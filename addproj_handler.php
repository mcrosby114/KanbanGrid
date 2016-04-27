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
    $p_title = test_input($_POST["p_title"]);
    $p_descrip = test_input($_POST["p_descrip"]);
    $p_date = ($_POST["p_due"]);
    if($p_date == ""){
      $p_date = NULL;
    }
    $p_color = ($_POST["colorPicker"]);
    $dao = new Dao();
    $nextRow = $dao->getNextRow($user_id);

    $dao->addProject($nextRow, $p_title, $user_id, $p_descrip, $p_date, $p_color);

    header("Location: grid.php");
    die;
  } catch(Exception $e) {
    var_dump($e);
    echo "I'm a dumb dumb.";
    die;
  }
}
?>
