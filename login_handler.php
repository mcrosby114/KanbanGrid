<?php
  if(!isset($_SESSION)) session_start();
  require_once ("dao.php");

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email = test_input($_POST["user_email"]);
  $password = test_input($_POST["user_password"]);
  $emailPresent = false;
  $passwordPresent = false;

  if (isset($_POST["Button_Pressed"])) {

    if(empty($email)) {
      $_SESSION["email"] = null;
      $_SESSION["email_error"] = "Email address required.";
      header("Location:signup.php");
      die;
    }
    else {
      if(!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $email)) {
        $_SESSION["email_error"] = "Invalid email syntax.";
        $_SESSION["email"] = $email;
        header("Location:signup.php");
        die;
      }
      else {
        $_SESSION["email"] = $email;
        $emailPresent = true;
      }
    }

    if(empty($password)) {
      $_SESSION["password"] = null;
      $_SESSION["password_error"] = "Password required.";
      header("Location:signup.php");
      die;
    }
    else if(strlen($password) < 8){
      $_SESSION["password"] = null;
      $_SESSION["password_error"] = "Password must be at least 8 characters long.";
      header("Location:signup.php");
      die;
    }
    else {
      $_SESSION["password"] = $password;
      $passwordPresent = true;
    }
  }

  if($emailPresent && $passwordPresent) {
    try {
      $dao = new Dao();
      if($dao->validateLogin($email,$password)){
        $_SESSION["access_granted"] = true;
        header("Location: grid.php");
        die;
      } else {
        $_SESSION["access_granted"] = false;
        $_SESSION["login_error"] = "Invalid combination of email and password.";
        header("Location:login.php");
        die;
      }
    } catch(Exception $e) {
        var_dump($e);
        echo "I'm a dumb dumb.";
        die;
    }
  }
?>
