<?php
  if(!isset($_SESSION)) session_start();
  require_once "dao.php";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if (isset($_POST["Button_Pressed"])) {

    if(empty($_POST["user_email"])) {
      $_SESSION["email"] = null;
      $_SESSION["email_error"] = "Email address required.";
      header("Location:login.php");
    }
    else {
      $email_entry = test_input($_POST["user_email"]);

      if(!preg_match("/^.+@.+$/", $email_entry)) {
        $_SESSION["email_error"] = "Invalid email syntax.";
        $_SESSION["email"] = $email_entry;
        header("Location:login.php");
      }
      else {
        $_SESSION["email"] = $email_entry;
      }
    }

    if(empty($_POST["user_password"])) {
      $_SESSION["password"] = null;
      $_SESSION["password_error"] = "Password required.";
      header("Location:login.php");
    } else {
      $password_entry = test_input($_POST["user_password"]);
      $_SESSION["password"] = $password_entry;
    }
  }

  if((isset($_SESSION["email"])) && (isset($_SESSION["password"]))
  && (!isset($_SESSION["email_error"])) && !(isset($_SESSION["password_error"]))) {
    try {

      $status=false;
      // $dao = new Dao();
      // $status = $dao->validateLogin($email_entry,$password_entry);

      if ($status===FALSE) {
        $_SESSION["login_error"] = "Invalid combination of email and password.";
        header("Location:login.php");
      }
      else {
        $_SESSION["logged_in"] = true;
        header("Location:grid.php");
      }
    } catch(Exception $e) {
        var_dump($e);
        echo "I'm a dumb dumb.";
        die;
    }
  }
?>
